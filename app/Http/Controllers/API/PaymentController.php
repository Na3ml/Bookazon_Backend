<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use App\Services\FatoorahServices;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class PaymentController extends Controller
{
    use ApiResponseTrait;
    //
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices){
        $this->fatoorahServices = $fatoorahServices;
    }
    public  function makePayment(Request $request){
        $user = User::find( JWTAuth::parseToken()->authenticate()->id );

        $order = Order::where('user_id', $user->id)->where('id',$request->order_id)->first();
        $price = $order->paid_amount;
//        dd($price);
        $data = [
            "CustomerName" => $user->first_name,
            "Notificationoption"=> "LNK",
            "Invoicevalue" =>$price,// total_price
            "CustomerEmail" => $user->email,
            "CalLBackUrl"=>route('callback'),
            "Errorurl"=> 'https://www.youtube.com/',
            "Languagn"=> 'en',
            "DisplayCurrencyIna"=>'EGY'
        ];

       $response =  $this->fatoorahServices->sendPayment($data);

       if(isset($response['IsSuccess']))
           if ($response['IsSuccess'] == true){
               OrderDetails::create([
                  'InvoiceID'=>$response['Data']['InvoiceId'],
                   'InvoiceURL'=>$response['Data']['InvoiceURL'],
                   'order_id'=>$order->id,
                   'user_id'=>$user->id,
                   'price'=>$price,
               ]);
               return $response;
           }



    }

    public function callback(Request $request)
    {
        $apiKey = env('fatoora_token');
        $postFields = [
            'Key'     => $request->paymentId,
            'KeyType' => 'paymentId'
        ];
        $response = $this->fatoorahServices->callAPI("https://apitest.myfatoorah.com/v2/getPaymentStatus", $apiKey, $postFields);
        $response = json_decode($response);
        if(!isset($response->Data->InvoiceId))
            return $this->apiResponse( 'error', null, 404 ,'Error Not Found' );
        $orderDetails = OrderDetails::where('InvoiceID',$response->Data->InvoiceId)->first();
        if($response->IsSuccess == true){
            if($response->Data->InvoiceStatus == "Paid")
                if($orderDetails->price == $response->Data->InvoiceValue){
                    $order = Order::where('id',$orderDetails->order_id )->update(['status'=>1]);

                    return $this->apiResponse( 'Order Paid Successfully and the status changed to Paid', null, 422 );
                }
        }

        return $this->apiResponse( 'error', null, 404 ,'Error Not Found' );
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      dd('fdfgbd');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($owner)
  {
      return view('admin.property.create',compact('owner'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request,$owner)
  {
      if ($owner){
          Property::create([
              'property_code' =>$request->property_code,
              'property_status' =>$request->property_status,
              'price' =>$request->price,
              'description' =>$request->description,
              'property_size' =>$request->property_size,
              'address' =>$request->address,
              'country' =>$request->country,
              'city' =>$request->city,
              'Additional_fees' =>$request->Additional_fees,
              'user_id' =>$owner,
          ]);
          return redirect()->route('propertyowner.show',$owner);
      }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>

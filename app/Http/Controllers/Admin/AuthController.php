<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function showLogin()
  {
      return view('auth.login');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        $user = ['email'=>$request->email,'password'=>$request->password];
        if(Auth::guard('admin')->attempt($user)){
            return redirect()->route('dashboard');
        }

    }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view('auth.register');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(RegisterRequest $request)
  {
      $user = User::create([
         'first_name'=>$request->first_name,
         'last_name'=>$request->last_name,
         'email'=>$request->email,
         'password'=>bcrypt($request->password),
         'role'=>'superadmin',
      ]);

      if ($user){
          return redirect()->route('login');
      }
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
  public function logout()
  {
      Auth::guard('admin')->logout();
      return redirect()->route('login');
  }

}

?>

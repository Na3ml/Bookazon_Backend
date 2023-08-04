<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyOwnerController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $users = User::where('role','Propertyowner')->get();
      return view('admin.propertyowner.index',compact('users'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view('admin.propertyowner.create');
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
          'role'=>'Propertyowner',
      ]);

      if ($user){
          return redirect()->route('properyowner.index');
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
//      dd($user);
      $user = User::findOrFail($id);
      return view('admin.propertyowner.edit',compact('user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
//      dd($request->all());
      $user = User::findOrFail($id);
      $password = $request->password ? bcrypt($request->password):$user->password;
      $user->update([
          'first_name'=>$request->first_name,
          'last_name'=>$request->last_name,
          'email'=>$request->email,
          'password'=>$password,
      ]);

      return redirect()->route('propertyowner.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $user = User::find($id);
      $user->delete();
      return redirect()->back();
  }

}

?>

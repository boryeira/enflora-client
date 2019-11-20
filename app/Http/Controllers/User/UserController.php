<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use Session;
use Validator;
use Hash;


class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function profile()
  {

      $user = Auth::user();
      return view('users.show')->with('user',$user);
  }


  public function passwordUpdate(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'password' => 'required|confirmed',
  ]);

  if ($validator->fails()) {
      return redirect::back()
                  ->withErrors($validator)
                  ->withInput();
  }
    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->email_verified_at = now();
    $user->save();
    return Redirect::back();

  }



}

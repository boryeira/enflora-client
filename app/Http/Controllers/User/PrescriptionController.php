<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use Session;
use Validator;



class PrescriptionController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show()
  {
      $prescription = Auth::user()->activePrescription;
      return view('users.prescription')->with('prescription',$prescription);
  }

  public function store()
  {
    //
  }


}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\Prescription;
use Redirect;
use Auth;
use Session;
use Validator;
use storage;



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

  public function store(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'prescription' => 'file|required',
    ]);

    if ($validator->fails()) {
        return redirect::back()
                    ->withErrors($validator)
                    ->withInput();
    }

    if($request->prescription) {
      $prescription = new Prescription;
      $prescription->user_id = Auth::user()->id;
      $prescription->save();

      $storage = Storage::put('public/user/'.Auth::user()->id.'/'.$prescription->id.'.jpg', $request->prescription);
      $prescription->file = url('/').'/storage/user/'.Auth::user()->id.'/'.$prescription->id.'.jpg';
      $prescription->save();
      Session::flash('success','Receta medica subida con éxito. Nos comunicaremos con usted cuando este validada.');
      return Redirect::route('prescription.show');
    } else {
      return Redirect::back()->withErrors(array('notfound' => 'Debe ser un archivo valido.'));
    }
  }


}

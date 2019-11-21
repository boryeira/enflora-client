@extends('layouts.app')

@section('content')
    @if($prescription == null)
    <div class="row justify-content-center">
        <div class="col-sm-6" >
        <div class="alert alert-danger text-center ">
            <h5>Debes tener una receta medica vigente para mantener tu membresia.</h5>
            <p>Regularice su situacion, en lo contrario su cuenta puede ser dada de baja</p>
            <a class="btn btn-primary btn-block" href="https://www.recetacannabis.cl/">Obtener Receta medica</a>

        </div>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-sm-6" >
                <div class="card">
                    @if(count(Auth::user()->revPrescription) == 0)
                    <div class="card-body">
                        <h5>Adjuntar Receta medica</h5>
                        <p>La receta médica será primero validada por nuestro equipo. Nos comunicaremos con usted cuando el proceso haya terminado.</p>
                        <form action="{{route('prescription.store')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-controll" name="prescription">
                            <button class="btn btn-success" type="submit">Subir receta médica</button>
                        </form>
                    </div>
                    @else 
                    <h5>Receta médica en revisión, nos comunicaremos con usted cuando el proceso esté listo.</h5>
                    @endif

                </div>
            </div>

    </div>
    @else
    <div class="row justify-content-center">
            <div class="col-sm-6" >
                <div class="card">        
                    <div class="card-body">
                        id {{$prescription->id}}
                    </div>
                </div>
                <div class="card mt-2">        
                        <div class="card-body">
                            foto
                        </div>
                    </div>
            </div>
    </div>

    @endif


@endsection


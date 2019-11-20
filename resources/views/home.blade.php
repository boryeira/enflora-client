@extends('layouts.app')

@section('content')

    @if(Auth::user()->activePrescription == null)
    <div class="row justify-content-center">
        <div class="col-sm-6" >
        <div class="alert alert-danger text-center ">
            <h5>Debes tener una receta medica vigente para mantener tu membresia.</h5>
            <p>Regularice su situacion, en lo contrario su cuenta puede ser dada de baja</p>
            <a class="btn btn-primary btn-block" href="https://www.recetacannabis.cl/">Obtener Receta medica</a>
        <small>*si ya tienes tu receta medica debes subir una copia digital <a href="{{route('prescription.show')}}">aqui</a></small>
        </div>
        </div>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
                
                <div class="card">
                    <div class="card-body">
                        <h5>Ordenes Activas</h5>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="list-group mb-4">
                            @foreach (Auth::user()->activeOrders as $order)
                                <li class="list-group-item">

                                    <a class="row" href="{{Route("orders.show",['order'=>$order->id])}}" style="width: 100%;color: inherit; text-decoration: none;">
                                       
                                        <span class="col">Orden #{{$order->id}}  </span>  
                                        <span class="col text-right text-{{$order->status['css']}}">{{$order->status['client']}} </span>
                                    </a>
                                    
                                </li>
                            @endforeach
                        </ul>
                    <a class="btn btn-primary btn-block" href="{{route('orders.create')}}">Nueva Orden</a>
                    </div>
                </div>
        </div>
{{-- 
        <div class="col-md-6">
                
                <div class="card">
                    <div class="card-body">
                        <h5>Historial</h5>
                        <ul class="list-group mb-4">
                            @foreach (Auth::user()->oldOrders as $order)
                            <li class="list-group-item">

                                    <a class="row" href="{{Route("orders.show",['order'=>$order->id])}}" style="width: 100%;color: inherit; text-decoration: none;">
                                       
                                        <span class="col">Orden #{{$order->id}}  </span>  
                                        <span class="col text-right text-{{$order->status['css']}}">{{$order->delivery_date->format('d-m-Y')}} </span>
                                    </a>
                                    
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
        </div> --}}

    </div>

@endsection

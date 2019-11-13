@extends('layouts.app')

@section('content')

    {{-- <div class="row justify-content-center">
            <div class="col-md-6">

                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            Nuevas funciones para el sistema enflora 
                        </div>
                    </div>
                </div>
    </div> --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
                <h5>Ordenes Activas</h5>
                <div class="card">
                    <div class="card-body">
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

        <div class="col-md-6">
                <h5>Historial</h5>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group mb-4">
                            @foreach (Auth::user()->oldOrders as $order)
                            <li class="list-group-item">

                                    <a class="row" href="{{Route("orders.show",['order'=>$order->id])}}" style="width: 100%;color: inherit; text-decoration: none;">
                                       
                                        <span class="col">Orden #{{$order->id}}  </span>  
                                        <span class="col text-right text-{{$order->status['css']}}">{{$order->status['client']}} </span>
                                    </a>
                                    
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
        </div>

    </div>

@endsection

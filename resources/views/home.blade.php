@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
            <div class="col-md-12">

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
    </div>
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
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class href="{{Route("orders.show",['order'=>$order->id])}}" style="color: inherit; text-decoration: none;">
                                        Orden #{{$order->id}}  
                                    </a>
                                    <span class="pull-right text-{{$order->status[1]}}">{{$order->status[0]}} </span>
                                </li>
                            @endforeach
                        </ul>
                    <a class="btn btn-primary btn-block" href="{{route('orders.create')}}">Nueva Orden</a>
                    </div>
                </div>
        </div>

        {{-- <div class="col-md-6">
                <h5>Historial</h5>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group mb-4">
                            @foreach (Auth::user()->oldOrders as $order)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Orden #{{$order->id}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
        </div> --}}

    </div>

@endsection

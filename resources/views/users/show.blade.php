@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                      
                        <h5>{{$user->full_name}}</h5>
                        <span>{{$user->email}}</span>
                        <form class="form-info m-3" action="{{route('logout')}}" method="POST" >
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <button class="btn btn-danger btn-block">cerrar sesion<i class="ti-shift-right ml-2 font-20"></i></button>
                        </form>

                    </div>
                </div>

        </div>

        <div class="col-md-6">
                
                <div class="card">
                    <div class="card-body">
                        <h5>Historial</h5>
                        <ul class="list-group mb-4">
                            @foreach ($user->oldOrders as $order)
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
        </div>

    </div>

@endsection


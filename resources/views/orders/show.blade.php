@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mb-2" >
            <div class="card-body">
            <h5 class="card-title">Orden #{{$order->id}}</h5>
            <div class="pull-right text-{{$order->status[1]}}">{{$order->created_at->format('d-m-Y')}}</div>
            <div class="pull-right text-{{$order->status[1]}}">{{$order->status[0]}}</div>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($order->items as $item)
                <li class="list-group-item">
                    <div class="row ">
                        <div class="col-2">
                            <img src="{{url($item->img)}}" class="rounded float-left" width="40">
                        </div>
                        <div class="col-6 text-left">
                            <h6>{{$item->name}}</h6>
                        </div>                  
                        <div class="col-4">
                            <h6>${{number_format($item->amount, 0, ',', '.') }}</h6>
                            <span>{{$item->quantity}} @if($item->quantity == 1) {{$item->unit['singular']}} @else {{$item->unit['plural']}} @endif</span>
                        </div>
                    </div>
                </li>
                @endforeach
                <li class="list-group-item ">
                    <div class="float-right text-danger"><h5>Total: ${{number_format($order->items()->sum('amount'), 0, ',', '.') }}</h5></div>
                </li>    
            </ul>
        
        </div>
        @if($order->status[2] == 2)
        <a class="btn btn-success btn-block mb-2" href="{{route('orders.payflow',['order'=>$order->id])}}">Pagar</a>
        <form id="formeliminar" action="{{route('orders.destroy',['order'=>$order->id])}}" method="POST" >
            {{ method_field('DELETE') }}
            @csrf
            <button class="btn btn-danger btn-block" id="eliminar"  type="submit" >Eliminar</button>
        </form>
        @endif
    </div>
</div>

@endsection
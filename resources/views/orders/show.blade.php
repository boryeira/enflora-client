@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mb-2" >
                <div class="card-body">
                <h5 class="card-title">Orden #{{$order->id}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$order->created_at->format('d-m-Y')}}</h6>
                <span class="pull-right text-{{$order->status[1]}}">{{$order->status[0]}} {{$order->status[2]}}</span>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($order->items as $item)
                    <li class="list-group-item">
                    <img src="{{url('/img/lote.jpg')}}" class="rounded float-left" width="60">
                        <span class="float-right">{{$item->quantity}}</span>
                    </li>
                    @endforeach
                        
                </ul>

        </div>
        @if($order->status[2] == 2)
        <a class="btn btn-success btn-block mb-2">Pagar</a>
        <form id="formeliminar" action="{{route('orders.destroy',['order'=>$order->id])}}" method="POST" >
            {{ method_field('DELETE') }}
            @csrf
            <button class="btn btn-danger btn-block" id="eliminar"  type="submit" >Eliminar</button>
        </form>
        @endif
    </div>
</div>

@endsection
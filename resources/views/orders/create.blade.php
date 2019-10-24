@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    @foreach ($products as $product)
    <div class="col-md-4">
        <div class="card card-air centered mb-4">
            <div class="rel">
                <img class="card-img-top" src="{{$product->img}}" alt="image" >
            </div>
            <div class="card-body ">
                <h5 class="card-title">{{$product->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted"><span class="text-{{$product->type[1]}}">{{$product->type[0]}}</span><span class="float-right">${{number_format($product->value, 0, ',', '.')}}</span></h6>
                <div class="form-group">
                    <input type="number" class="form-control input-quantity" min="0" name="{{$product->id}}">
                </div>
                
            </div>

            
            
        </div>
    </div>
    @endforeach
</div>

<footer class="fixed-bottom text-center">
    <div class="bg-primary">
      <button class="btn btn-info btn-block btn-air" type="submit">ORDEN TOTAL: $<span id="order_price">0</span></button>
    </div>
</footer>
@endsection

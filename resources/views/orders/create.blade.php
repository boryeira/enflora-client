@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    @foreach ($products as $product)
    <div class="col-md-4">
        <div class="card card-air centered mb-4">
            <div class="rel">
                <img class="card-img-top" src="{{url('/img/splash.png')}}" alt="image" height="150px">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <div class="form-group">
                    <input type="number" class="form-control input-quantity" min="0" name="{{$product->id}}">
                </div>
                
            </div>
            
            
        </div>
    </div>
    @endforeach
</div>
@endsection

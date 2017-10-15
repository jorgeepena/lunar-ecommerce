@extends('layouts.front.default')

@section('content')
<div class="jumbotron">
    <div class="container text-center">
        <h1>L U N A R <br> S T O R E</h1>

        <p style="width: 40%; margin:20px auto;">Lunar is an e-commerce solution developed with Laravel using Bootstrap 4.0</p>

        <a href="{{ route('great-detail') }}" class="btn btn-primary">Explore the store</a>
    </div>
</div>

<div class="container">
    @foreach($products->chunk(3) as $productGroup)
    <div class="card-group">
        @foreach($productGroup as $product)

        <div class="card">
            <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
            <div class="card-body">
                <h4 class="card-title">{{ $product->name }}</h4>
                <p class="card-text">$ {{ $product->price }}</p>

                <p><a href="{{ route('add-cart', ['id' => $product->id]) }}" class="btn btn-default" role="button"><i class="fa fa-cart-plus"></i> Add to Cart</a> 

                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-success" role="button"><i class="fa fa-plus-circle"></i> View Detail</a></p>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection

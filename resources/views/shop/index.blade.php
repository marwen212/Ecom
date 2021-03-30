@extends('home')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="{{ asset('produits/'.$product->image) }}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">{{ $product->title }}<br> {{ $product->description }}<br> 
              
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">{{ $product->getPrice()}} </span>
                <a href="{{ route('products.show',['slug'=>$product->slug]) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
            </div>
            </div>
          </div>
        
        </div>
        @endforeach
       
      </div>
    </div>
  </div>
  
@endsection

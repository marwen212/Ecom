@extends('shop')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        
    </ol>
</nav>
<main role="main">


    <div class="container">


        <div class="row justify-content-between">

            <div class="col-6">
               
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('produits/'.$product->image)}}" alt="Card image cap">

                </div>
            </div>
            <div class="col-6">

                <h1 class="jumbotron-heading"{{ $product->Title }}</h1>
                <h5>{{$product->getPrice() }}</h5>
                <p class="lead text-muted">{{ $product->description }}</p>
                <hr>
                
                
               
               
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i> Ajouter au Panier</button>
                  </form>
                

            </div>
        </div>
    </div>


<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <h3>Vous aimerez aussi :</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img src="{{ asset('produits/ajax.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">

                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img src="{{ asset('produits/milan.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">

                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img src="{{ asset('produits/bayern.jpg')}}" class="card-img-top img-fluid" alt="Responsive image">

                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

</main>
@endsection
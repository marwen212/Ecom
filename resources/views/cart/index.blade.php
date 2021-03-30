@extends('shop')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
@if (Cart::count() > 0)
<div class="px-4 px-lg-0">
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Produit</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Prix</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">                      </div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Supprimer</div>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $product)
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="{{ $product->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"> <a href="{{ route('products.show', ['slug' => $product->model->slug]) }}" class="text-dark d-inline-block align-middle">{{ $product->model->title }}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category:</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>{{ getPrice($product->subtotal()) }}</strong></td>
                                    <td class="border-0 align-middle">
                                        
                                    </td>
                                    <td class="border-0 align-middle">
                                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
            <div class="row p-4 bg-white rounded shadow-sm">
                
                    
                    
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détails de la commande
                    </div>
                    <div class="p-4">
                        
                        <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{ getPrice(Cart::subtotal()) }}</strong></li>
                        {{-- <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li> --}}
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>{{ getPrice(Cart::tax()) }}</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                            <h5 class="font-weight-bold">{{ getPrice(Cart::total()) }}</h5>
                        </li>
                        </ul><a href="{{ route('checkout.index') }}" class="btn btn-dark rounded-pill py-2 btn-block"><i class="fa fa-credit-card" aria-hidden="true"></i> Passer à la caisse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="col-md-12">
    <h5>Votre panier est vide pour le moment.</h5>
    <p>Mais vous pouvez visiter la <a href="{{ route('products.index') }}">boutique</a> pour faire votre shopping.
    </p>
</div>
@endif

@endsection

@section('extra-js')
<script>
    var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = element.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/panier/${rowId}`,
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'patch',
                    body: JSON.stringify({
                        qty: this.value
                    })
            }).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            });
        });
    });
</script>
@endsection

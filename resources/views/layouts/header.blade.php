<header>
  <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
          <div class="row">
              <div class="col-sm-8 col-md-7 py-4">
                  <h4 class="text-white">About</h4>
                 
              </div>
              <div class="col-sm-4 offset-md-1 py-4">
                  <h4 class="text-white">Contact</h4>
                  <ul class="list-unstyled">
                      <li><a href="#" class="text-white">Follow on Twitter</a></li>
                      <li><a href="#" class="text-white">Like on Facebook</a></li>
                      <li><a href="#" class="text-white">Email me</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <div class="navbar navbar-dark bg-dark box-shadow">
      <div class="container d-flex justify-content-between">
          <a href="{{ route('products.index') }}" class="navbar-brand d-flex align-items-center">
            <span class="iconify" data-icon="jam:shopify-square" data-inline="false" style="color: #FF5353;"></span>
              <strong>Mon T-Shirt</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Panier<span class="badge badge-pill badge-dark">{{ Cart::count() }}</span></a>
              </li>
          </ul>
      </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-red">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
             
          </ul>
      </div>
  </nav>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
</header>
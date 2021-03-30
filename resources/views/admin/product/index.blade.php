@extends('admin.layout.admin')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Product Name</td>
          <td>Categorie</td>
          <td>Sponsor</td>
          <td>Product Description</td>
          <td>Price</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->sponsor}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td><a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary">Modifer</a></td>
            <td>
                <form action="{{ route('product.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
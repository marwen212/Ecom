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
          <td>Client ID</td>
          <td>Amount</td>
          <td>Products</td>
          <td>Date de payment</td>
          
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->user_id}}</td>
            <td>{{$order->amount}}</td>
            <td>{{$order->products}}</td>
            <td>{{$order->payment_created_at}}</td>
            
           
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
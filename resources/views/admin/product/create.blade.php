@extends('admin.layout.admin')
@section('content')
<h3>Add Product</h3>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        {!! Form::open(['route' => 'product.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control','required'=>'')) }}
        </div>
        <div class="form-group">
            {{ Form::label('subtitle', 'Subtitle') }}
            {{ Form::text('subtitle', null, array('class' => 'form-control','required'=>'')) }}
        </div>
        <div class="form-group">
            {{ Form::label('sponsor', 'Sponsor') }}
            {{ Form::text('sponsor', null, array('class' => 'form-control','required'=>'')) }}
        </div>
        <div class="form-group">
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', null, array('class' => 'form-control','required'=>'')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('price', 'Price') }}
            {{ Form::text('price', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('category_id', 'Categories') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Select Category']) }}
        </div>

        

        <div class="form-group">
            {{ Form::label('image', 'Image') }}
            {{ Form::file('image',array('class' => 'form-control')) }}
        </div>

         {{ Form::submit('Create', array('class' => 'btn btn-default')) }}
        {!! Form::close() !!}

    </div>
</div>
@endsection
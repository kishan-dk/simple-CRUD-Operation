@extends('productcategory.layout')

@section('content')
<div class="row" style="margin-top: 2.5%;margin-bottom: 2.5%;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('productscategory.index') }}"> Back</a>
            <a href="{{url('SignOut')}}"  class="btn btn-primary">Logout</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ url('productscategory/updates') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="PUT">
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $product->product_category }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
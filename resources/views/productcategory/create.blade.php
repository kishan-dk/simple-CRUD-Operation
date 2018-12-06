@extends('products.layout')
<div style="margin: 2.5%;"></div>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product Category</h2>
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

<form action="{{ url('productscategory/store') }}" method="POST">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
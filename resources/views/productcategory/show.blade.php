@extends('productcategory.layout')

@section('content')
<div class="row" style="margin-top: 2.5%;margin-bottom: 2.5%;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('productscategory.index') }}"> Back</a>
            <a href="{{url('SignOut')}}"  class="btn btn-primary">Logout</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Category Name:</strong>
            {{ $product->product_category }}
        </div>
    </div>
</div>
@endsection
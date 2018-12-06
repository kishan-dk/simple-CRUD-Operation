@extends('products.layout')

@section('content')
<div class="row" style="margin-top: 2.5%;margin-bottom: 2.5%;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            <a href="{{url('SignOut')}}"  class="btn btn-primary">Logout</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $product->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Details:</strong>
            {{ $product->detail }}
        </div>
    </div>
</div>
<strong>Images:</strong>
<div class="row">
    @if ($product->product_image != "")
        @foreach(explode('|', $product->product_image) as $image) 
            <div class="col-md-2">
                <div class="form-group">
                    <img src="/images/{{$image}}" alt="{{$image}}" style="width:150px;height:150px;"/>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
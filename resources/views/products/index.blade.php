@extends('products.layout')
<style>
    .btn-success{
        margin-top: 13%;
        margin-bottom: 10%;
    }
    .div-class{
        margin-top: 1%;
        margin-bottom: 1%;
    }
</style>
@section('content')
<div class="div-class">
    <h3>Product List
        <a href="{{url('SignOut')}}" style="float:right;" class="btn btn-primary">Logout</a>
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">   
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            <a class="btn btn-success" href="{{ route('productscategory.index') }}"> View Product Category List</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Category</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>
            @foreach($category as $cat)
                @if($product->category_id==$cat->id)
                    {{$cat->product_category}}
                @endif
            @endforeach
        </td>
        <td>{{ $product->detail }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" id="frm_de" method="POST">

                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete" />

                <button type="submit" onclick="return confirm('Are you sure delete product?')" class="btn btn-danger" >Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{!! $products->links() !!}

@endsection
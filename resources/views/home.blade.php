@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($products as $product)
                @include('includes.product',['product' => $product])
            @endforeach
        <div  class="crearfix"></div>
        {{ $products->links() }}
        </div>
    </div>
</div>
@endsection

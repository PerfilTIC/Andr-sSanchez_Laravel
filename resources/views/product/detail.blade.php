@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                    <div class='data-user'>
                        <span class="nickname"> {{  $product->name  }} </span>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="description">
                        <p>{{ 'Descripción: '.$product->description }}</p>
                    </div>
                    <div class="description">
                        <p>{{ 'Peso: '.$product->weight }}</p>
                    </div>
                    <div class="description">
                        <p>{{ 'Precio: '.$product->price }}</p>
                    </div>
                    <div class="description">
                        <p>{{ 'Categoria: '.$product->category_id }}</p>
                    </div>
                    <div class="image-container image-detail">
                        <img src="{{ route('product.file',['filename' => $product->image1]) }}" />
                    </div>
                    <div class="image-container image-detail">
                        <img src="{{ route('product.file',['filename' => $product->image2]) }}" />
                    </div>
                    <div class="image-container image-detail">
                        <img src="{{ route('product.file',['filename' => $product->image3]) }}" />
                    </div>
                    @if(Auth::user()->email == 'admin@admin.com')
                    <div class="actions">
                        <a href="{{ route('product.edit',['id' => $product->id]) }}" class="btn btn-sm btn-primary">Actualizar</a>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                            Eliminar
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">¿Estás seguro?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Sí eliminas el producto no podrás recuperarlo, ¿estás seguro de querer borrarlo?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                        <a href="{{route('product.delete',['id' => $product->id])}}" class="btn btn-danger">Borrar Definitivamente</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div  class="crearfix"></div>
        </div>
    </div>
</div>
@endsection

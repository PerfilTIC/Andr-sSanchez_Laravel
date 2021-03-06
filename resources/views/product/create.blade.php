@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear nuevo producto</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right" >Nombre</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('image_path') is-invalid @enderror" name="name" autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right" >Descripción</label>

                            <div class="col-md-7">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-md-3 col-form-label text-md-right" >Peso (g)</label>

                            <div class="col-md-7">
                                <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" autocomplete="weight">
                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-3 col-form-label text-md-right" >Precio USD</label>

                            <div class="col-md-7">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" autocomplete="price">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-3 col-form-label text-md-right" >Categoría</label>

                            <div class="col-md-7">
                                <select name="category_id" class="form-control">
                                    <option>
                                        Categorías disponibles
                                    </option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image1" class="col-md-3 col-form-label text-md-right" >Imagen 1</label>

                            <div class="col-md-7">
                                <input id="image1" type="file" class="form-control @error('image1') is-invalid @enderror" name="image1" autocomplete="image1">
                                @error('image1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image2" class="col-md-3 col-form-label text-md-right" >Imagen 2</label>

                            <div class="col-md-7">
                                <input id="image2" type="file" class="form-control @error('image2') is-invalid @enderror" name="image2" autocomplete="image2">
                                @error('image2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image3" class="col-md-3 col-form-label text-md-right" >Imagen 3</label>

                            <div class="col-md-7">
                                <input id="image3" type="file" class="form-control @error('image3') is-invalid @enderror" name="image3" autocomplete="image3">
                                @error('image3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Crear producto"/>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


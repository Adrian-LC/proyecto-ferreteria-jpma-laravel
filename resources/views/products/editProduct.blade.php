@extends('layouts.plantilla')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editProduct', $product->id) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="name_p" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name_p" type="text" class="form-control @error('name_p') is-invalid @enderror" name="name_p" value="{{ $product->name_p }}" autocomplete="name_p" autofocus>

                                @error('name_p')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price_p" class="col-md-4 col-form-label text-md-right">{{ __('Precio ($)') }}</label>

                            <div class="col-md-6">
                                <input id="price_p" type="text" class="form-control @error('price_p') is-invalid @enderror" name="price_p" value="{{ $product->price_p }}" autocomplete="price_p" autofocus>

                                @error('price_p')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="offer" class="col-md-4 col-form-label text-md-right">{{ __('Oferta (%)') }}</label>

                            <div class="col-md-6">
                                <input id="offer" type="text" class="form-control @error('offer') is-invalid @enderror" name="offer" value="{{ $product->offer }}" autocomplete="offer" autofocus>

                                @error('offer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detail" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <textarea id="detail" class="w-100 form-control @error('detail') is-invalid @enderror" name="detail" value="" autocomplete="detail" autofocus rows="5">{{ $product->detail }}</textarea>
                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Poster') }}</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control @error('poster') is-invalid @enderror" name="poster" value="" autocomplete="poster" autofocus>

                                @error('poster')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $product->stock }}" autocomplete="stock" autofocus>

                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Producto en Sección "Nuevo"') }}</label>

                            <div class="col-md-6">
                                <input id="" type="radio" class="" name="new" value="1" autocomplete="new" autofocus {{ ($product->new == 1) ? "checked" : "" }}> Si
                                <input id="" type="radio" class="" name="new" value="0" autocomplete="new" autofocus {{ ($product->new == 0) ? "checked" : "" }}> No
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Activar Producto') }}</label>

                            <div class="col-md-6">
                                <input id="" type="radio" class="" name="state_p" value="1" autocomplete="state_p" autofocus {{ ($product->state_p == 1) ? "checked" : "" }}> Si
                                <input id="" type="radio" class="" name="state_p" value="0" autocomplete="state_p" autofocus {{ ($product->state_p == 0) ? "checked" : "" }}> No
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hola" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-6">
                                <select id="" class="w-100 form-control @error('product_category_id') is-invalid @enderror" name="product_category_id">
                                    <option value="{{ $product->product_category->id }}">{{ $product->product_category->name_pc }}</option>
                                    @foreach($productCategories as $productCategory)
                                      <option value="{{ $productCategory->id }}">{{ $productCategory->name_pc }}</option>
                                    @endforeach
                                </select>

                                @error('product_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar Producto') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

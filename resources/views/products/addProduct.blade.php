@extends('layouts.plantilla')

@section('content')
<div class="container">
    @if(!isset($productCategories[0]))
      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
          <strong>No se puede crear un producto, porque no existe ninguna categoría.</strong>
          <br>
          <a  class="text-danger" href="{{ route('addProductCategory') }}"><b>{{ __('Agregar Categoría de Producto') }}</b></a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="_form card">
                <div class="card-header">{{ __('Agregar Producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addProduct') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name_p" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name_p" type="text" class="form-control @error('name_p') is-invalid @enderror" name="name_p" value="{{ old('name_p') }}" autocomplete="name_p" autofocus>

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
                                <input id="price_p" type="text" class="form-control @error('price_p') is-invalid @enderror" name="price_p" value="{{ old('price_p') }}" autocomplete="price_p" autofocus>

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
                                <input id="offer" type="text" class="form-control @error('offer') is-invalid @enderror" name="offer" value="{{ old('offer') }}" autocomplete="offer" autofocus>

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
                                <textarea id="detail" class="w-100 form-control @error('detail') is-invalid @enderror" name="detail" value="" autocomplete="detail" autofocus rows="5">{{ old('detail') }}</textarea>
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
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" autocomplete="stock" autofocus>

                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Activar Producto') }}</label>

                            <div class="col-md-6 d-flex align-items-center">
                                <div class="mr-3">
                                  <input id="" type="radio" class="" name="state_p" value="1" autocomplete="state_p" autofocus checked> Si
                                </div>
                                <div>
                                  <input id="" type="radio" class="" name="state_p" value="0" autocomplete="state_p" autofocus> No
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-6">
                                <select id="" class="w-100 form-control @error('product_category_id') is-invalid @enderror" name="product_category_id">
                                    <option value="">Seleccione una opción...</option>
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
                                <button type="submit" class="btn btn-primary" {{ (!isset($productCategories[0])) ? "disabled" : "" }}>
                                    {{ __('Agregar Producto') }}
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

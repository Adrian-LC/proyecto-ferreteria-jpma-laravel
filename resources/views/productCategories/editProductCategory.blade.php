@extends('layouts.plantilla')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="_form card">
                <div class="card-header">{{ __('Editar Categoría de Producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editProductCategory', $productCategory->id) }}">
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="name_pc" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name_pc" type="text" class="form-control @error('name_pc') is-invalid @enderror" name="name_pc" value="{{ $productCategory->name_pc }}" autocomplete="name_pc" autofocus>

                                @error('name_pc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Activar Categoría') }}</label>

                            <div class="col-md-6 d-flex align-items-center">
                              <div class="mr-3">
                                <input id="" type="radio" class="" name="state_pc" value="1" autocomplete="state_pc" autofocus {{ ($productCategory->state_pc == 1) ? "checked" : "" }}> Si
                              </div>
                              <div>
                                <input id="" type="radio" class="" name="state_pc" value="0" autocomplete="state_pc" autofocus {{ ($productCategory->state_pc == 0) ? "checked" : "" }}> No
                              </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar Categoría de Producto') }}
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

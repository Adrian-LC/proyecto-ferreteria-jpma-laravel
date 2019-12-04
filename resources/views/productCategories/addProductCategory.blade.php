@extends('layouts.plantilla')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Categoría de Producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addProductCategory') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name_pc" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name_pc" type="text" class="form-control @error('name_pc') is-invalid @enderror" name="name_pc" value="{{ old('name_pc') }}" autocomplete="name_pc" autofocus>

                                @error('name_pc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar Categoría de Producto') }}
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

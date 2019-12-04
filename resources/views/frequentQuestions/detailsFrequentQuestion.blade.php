@extends('layouts.plantilla')

@section('content')
  <p>{{ $frequentQuestion->question }}</p>
  <p>{{ $frequentQuestion->answer }}</p>
@endsection

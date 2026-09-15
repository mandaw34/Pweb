@extends('layouts.app')
@section('title', 'Products')
@section('content')
<ul>
@foreach ($products as $product)
<li>{{ $product }}</li>
@endforeach
</ul>
@endsection
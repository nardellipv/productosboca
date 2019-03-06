@extends('layouts.admin')

@section('content')
    @include('admin.parts.dashboard._widget')
    @include('admin.parts.dashboard._listBuy')
    @include('admin.parts.dashboard._listProduct')
    @include('admin.parts.dashboard._listUsers')
@endsection
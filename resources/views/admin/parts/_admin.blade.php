@extends('layouts.admin')

@section('content')
    @include('admin.parts.dashboard._widget')
    @include('admin.parts.dashboard._listBuy')
    @include('admin.parts.dashboard._listUsers')
    @include('admin.parts.dashboard._listNewsLetter')
@endsection
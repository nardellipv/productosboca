@extends('layouts.app')

@section('content')
    {{--@include('parts.home._slider')--}}
    @include('parts.home._newProducts')
    @include('parts.home._offerBanner')
    @include('parts.home._topSelling')
@endsection

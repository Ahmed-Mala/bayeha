@extends('layouts.app')
@section('title',__('Home'))
@section('content')
<div class="container">
    <a href="{{route('ads.create')}}" class="btn btn-lg btn-primary">{{__('Add Your Ad')}}</a>
</div>
@endsection

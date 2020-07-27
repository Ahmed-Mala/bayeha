@extends('layouts.app')

@section('title',__('Edit ad'))

@section('content')

<h2>{{__('Edit ad')}}</h2>
<form class="" action="{{route('ads.update', $ad)}}" method="post">
    @method('PATCH')
    @include('ads._form', ['submitText' => __('Edit')])
</form>

@endsection

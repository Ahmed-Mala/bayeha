@extends('layouts.app')

@section('title',__('Create ad'))

@section('content')


<h2>{{__('Create ad')}}</h2>

<form action="{{route('ads.store')}}" method="post" enctype="multipart/form-data">

  @include('ads._form', ['submitText' => __('Save')])





</form>

@endsection

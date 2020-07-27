@extends('layouts.app')

@section('title', $ad->title)

@section('content')

  <div class="card border-danger ">

    <h4 class="card-header">{{$ad->title}}</h4>


    <div class="card-body">
        {!! nl2br($ad->content) !!}
        <br>
        <p> <img class="card-img" src="/uploads/{{ $ad->image }}" alt=""></p>
    </div>

    <div class="card-footer text-muted">
          <div> <b>{{__('Author')}}</b>{{$ad->user->name}}</div>
          <div> <b>{{__('Created at')}}</b>{{$ad->created_at}}</div>
          <div> <b>{{__('Updated at')}}</b>{{$ad->updated_at}}</div>
    </div>
  </div>


@endsection

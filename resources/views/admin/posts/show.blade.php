@extends('layouts.admin')
@section('content')

<div class="container p-3 text-center">
  <h1 class="fs-2 text-secondary my-4">{{$post->title}}</h1>

  <div class="paragraph p-4  rounded-3">
    <p class="">{!! $post->text !!}</p> {{--}}<------------ abilitare tag modifica testo{{--}}
  </div>

  <div class="card w-75 p-5 m-auto ">
    <img class="w-100 m-auto" src="{{asset('storage/' . $post->image_path ) }}" alt="{{$post->image_path}}">
  </div>

  <div class=" p-1   rounded-3  text-end">
    <span class="">{{$dataformattata}}</span>
  </div>


</div>
@endsection

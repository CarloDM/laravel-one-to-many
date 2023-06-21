@extends('layouts.admin')
@section('content')


<div class="container p-3 text-center">
    <h2 class="fs-4 text-secondary my-4">home dashboard</h2>

    <div class="">
      <a class="btn btn-success mb-4" href="{{route('admin.posts.create')}}">create post</a>

    </div>
</div>
@endsection

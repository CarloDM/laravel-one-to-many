@extends('layouts.admin')
@section('content')

<div class="container p-3 text-center">
  <h2 class="fs-4 text-secondary my-3">Elenco Posts</h2>



  <div class="">

    <table class="table table-info table-striped">
      <thead></thead>
        <tr>
          <th scope="col"><a href="{{route('admin.orderby', ['direction'=> $direction] )}}">ID</a></th>
          <th scope="col">Titolo</th>
          <th scope="col">Data</th>
          <th scope="col">autore</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as  $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <th scope="row">{{$post->title}}</th>
            @php $date = date_create($post->date);@endphp
            <th scope="row">{{date_format($date, 'd/m/y') }}</th>
            <th scope="row">{{$post->author_id}}</th>
            <th scope="row"><a class="btn btn-dark p-2" href="{{route('admin.posts.show', $post )}}">leggi</a></th>
            <th scope="row"><a class="btn btn-primary p-2" href="{{route('admin.posts.edit', $post )}}">edit</a></th>
            <th scope="row">@include('admin.posts.formdelete')</th>
        </tr>
        @endforeach

      </tbody>

    </table>

    <div>
      {{$posts->links()}}
    </div>
  </div>
</div>
@endsection

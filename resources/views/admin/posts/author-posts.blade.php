@extends('layouts.admin')
@section('content')
<div class="container">
  <h3>author posts</h3>
  <div class="container">

    <ul >
      @foreach ($authors as $author )
        <li class=" my-4">
          {{$author->name}}
          <ul>
            @forelse ($author->posts as $post )
            <li>
              <a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a>

            </li>

              @empty
              <li> nessun post </li>
            @endforelse
          </ul>
        </li>

      @endforeach
    </ul>

  </div>
</div>
@endsection

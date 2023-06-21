@extends('layouts.admin')
@section('content')
<div class="container p-3 text-center">

  <h1 class="fs-2 text-secondary my-4">{{$title}}</h1>

  {{-- @if ($errors->any())
  <div class="message">
    @foreach ($errors->all() as $error )
    <span class="fs-6">{{$error}}</span>
    @endforeach

  </div>
  @endif --}}

  <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="mb-3">

      <label for="title" class="form-label">Title</label>
      <input
        id="title"
        name="title"

        value="{{old('title', $post->title)}}"

        class="form-control @error('title') is-invalid @enderror"
        placeholder="TItle"
        type="text"
      >
      @error('title')<div id="" class="form-text">{{$message}}</div>  @enderror
    </div>
        {{-- --------------------------- --}}
    <div class="mb-3">

      <label for="reading_time" class="form-label">reading_time</label>
      <input
        id="reading_time"
        name="reading_time"
        value="{{old('reading_time', $post->reading_time)}}"
        class="form-control"
        placeholder=""
        type="number"
      >
      <div id="" class="form-text"></div>
    </div>
        {{-- --------------------------- --}}
    <div class="mb-3">

      <label for="text" class="form-label">testo</label>
      <textarea
      class="form-control"

      id="text"
      name="text"
      rows="10"
      placeholder="inserisci testo"
      type="text"
      >
      {{old('text', $post->text )}}
      </textarea>
      @error('text')<div id="" class="form-text">{{$message}}</div>  @enderror<div id="" class="form-text"></div>
    </div>
    {{-- --------------------------- --}}
    <div class="mb-3">

      <label for="image" class="form-label">file</label>
      <input
        id="image"
        name="image"
        onchange="previewImg(event)"
        class="form-control"
        placeholder=""
        type="file"
      >
      <div class="card w-75 p-5 m-auto ">
        <img class="w-100 m-auto" src="{{asset('storage/' . $post->image_path ) }}" alt="{{$post->image_path}}">
      </div>
      <img id="preview" src="" alt="" style="width: 200px" class="mt-4">
      <div id="" class="form-text"></div>
    </div>
        {{-- --------------------------- --}}

    <button
      class="btn btn-dark "
      type="submit"
      >
      invia
    </button>
  </form>


  <script>
    ClassicEditor
        .create( document.querySelector( '#text' ) )
        .catch( error => {
            console.error( error );
        } );

    function previewImg(event){
      const tagImg = document.getElementById('preview')
      tagImg.src = URL.createObjectURL(event.target.files[0])
      // console.log(URL.createObjectURL(event.target.files[0]))
    }
</script>
</div>
@endsection

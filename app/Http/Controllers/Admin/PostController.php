<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direction = 'asc';
        $posts = Post::orderBy('id', $direction)->paginate(10);
        return view('admin.posts.index', compact('posts', 'direction'));
    }

    public function orderby($direction){
        $direction = $direction === 'asc' ? 'desc' : 'asc';
        $posts = Post::orderBy('id', $direction)->paginate(10);
        return view('admin.posts.index', compact('posts', 'direction'));
    }

    public function authorPosts(){
      $authors = Author::All();
      return view('admin.posts.author-posts', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $authors = Author::All();
      $post = new Post();
      $title = 'Crea nuovo post';
      $method = 'POST';
      $route = route('admin.posts.store');
      return view('admin.posts.create-edit', compact('title', 'method','route','post','authors') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {
        // dd($request->all());
        $form = $request->all();
        // dd($request);
      // if(array_key_exists('image', $form)){
      //   $form['image_original_name'] = $request->file('image')->getClientOriginalName();
      //   $form['image_path'] = Storage::put( 'uploads', $form['image'] );
      //   // dd('immagine presente' , $form);
      // }

        $new_post = new Post();
        $new_post->slug = Post::generateSlug($form['title']);
        $new_post->title = $form['title'];
        $new_post->text = $form['text'];
        $new_post->reading_time = $form['reading_time'];
        $new_post->author_id = $form['author'];
        $new_post->date = date('Y-m-d');
        if(array_key_exists('image', $form )){
          $form['image_original_name'] =  $request->file('image')->getClientOriginalName();
          $form['image_path'] =  Storage::put('uploads/', $form['image']);
        };
        $new_post->image_original_name = $form['image_original_name'];
        $new_post->image_path = $form['image_path'];
        // dd($request->image);
        // dd($new_post);
        $new_post->save();
        return redirect()->route('admin.posts.show', $new_post);

        /**------------ fillable metod
        $new_post = new Post();
        $new_post->fill($form);
        --------------------------- */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post  $post)
    {

      $date = date_create($post->date);
      $dataformattata = date_format($date, 'd/m/y');
      return view('admin.posts.show', compact('post','dataformattata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post  $post)
    {
        $authors = Author::All();
        $title = 'Edit post di:' . $post->title;
        $method = 'PUT';
        $route = route('admin.posts.update', $post);
        return view('admin.posts.create-edit', compact('title','method','route','post','authors') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post  $post)
    {
        $form = $request->all();
        if($form['title'] !== $post->title){
            $form['slug'] = Post::generateSlug($form['title']) ;
        }else{
            $form['slug'] = $post->slug;
        }

        $form['date'] = date('Y-m-d');
        $post->update($form);



        $date = date_create($post->date);
        $dataformattata = date_format($date, 'd/m/y');
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index', $post);
    }
}

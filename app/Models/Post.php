<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'slug',
      'text',
      'date',
      'reading_time',
      'image_path',
      'image_original_name',
    ];

    public static function generateSlug($str){

      $slug = Str::slug($str, '-');
      $original_slug = $slug;
      $slug_exist = Post::where('slug', $slug)->first();
      $c = 1;
      while($slug_exist){
        $slug = $original_slug . '-' . $c;
        $slug_exist = Post::where('slug', $slug)->first();
        $c ++;
      }
      return $slug;
    }
}

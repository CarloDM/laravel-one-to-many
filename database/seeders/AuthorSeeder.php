<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $seeds = ['Debora Gallo','Manfredo Barese','Marco Pinto','Publio Lucchesi','Delinda Genovesi','Amina Bianchi',];

      foreach ($seeds as $value) {
        $new_author = new Author();
        $new_author->name = $value;
        $new_author->save();
        // dump('saved', $new_author);
      }

    }
}

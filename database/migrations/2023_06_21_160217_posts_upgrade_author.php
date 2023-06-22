<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
          $table->unsignedBigInteger('author_id')->nullable()->after('id');
          $table->foreign('author_id')
                ->references('id')
                ->on('authors');
                // se volessi non perdere il post relazionato all autore?
                // ->onDelete('set_null');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
          $table->dropForeign(['author_id']);
          $table->dropColumn('author_id');
        });
    }
};

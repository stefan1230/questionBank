<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('answer');
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('question_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        
        Schema::dropIfExists('answers');
    }
}

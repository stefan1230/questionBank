<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('question_id')->unsigned();
            $table->Integer('tag_id')->unsigned();
            $table->timestamps();
        });

        // //have create a seperate function to add foreign key
        // Schema::table('question_tag',function(Blueprint $table){
        //     $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        //     $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropForeign(['question_id','tag_id']);
        Schema::dropIfExists('question_tag');
       
       
    }
}

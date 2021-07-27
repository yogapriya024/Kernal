<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stubs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('slug');
            $table->unsignedBigInteger('post_id');
			$table->foreign('post_id')->references('id')->on('users');
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
        Schema::dropIfExists('stubs');
    }
}

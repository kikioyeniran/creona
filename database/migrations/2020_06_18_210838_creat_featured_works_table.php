<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatFeaturedWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_works', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('picture');
            $table->string('disabled')->default('false');
            $table->string('title');
            $table->string('status')->default('pending');
            $table->bigInteger('price');
            $table->string('link');
            $table->unsignedBigInteger('user_id');
            $table->mediumText('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

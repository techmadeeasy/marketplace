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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('image_path');
            $table->foreignId('category_id')->references('id')->on('listing_categories')->cascadeOnUpdate();
            $table->date('publication_date');
            $table->date('date_unpublished')->nullable();
            $table->double('price', 10, 2);
            $table->string('currency')->default('ZAR');
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
        Schema::dropIfExists('listings');
    }
};

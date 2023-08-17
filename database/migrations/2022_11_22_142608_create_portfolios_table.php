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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable;
            $table->string('name')->nullable;
            $table->string('image')->nullable;
            $table->text('description')->nullable;
            $table->string('link')->nullable;
            $table->string('date')->nullable;
            $table->string('client')->nullable;
            $table->string('facebook')->nullable;
            $table->string('youtube')->nullable;
            $table->string('linkedin')->nullable;
            $table->string('twitter')->nullable;
            $table->integer('active')->default(1);
            $table->integer('position')->default(1);
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
        Schema::dropIfExists('portfolios');
    }
};

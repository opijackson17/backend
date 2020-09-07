<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('universty_id')->constrained();
            $table->string('name');
            $table->enum('type', ['Mixed', 'Girls','Boys']);
            $table->string('profileImage')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
          * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostels');
    }
}

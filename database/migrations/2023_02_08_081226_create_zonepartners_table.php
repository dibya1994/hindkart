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
        Schema::create('zonepartners', function (Blueprint $table) {
            $table->id();
            $table->integer('zone_id');
            $table->string('name',100);
            $table->string('email',100);
            $table->string('phone',20);
            $table->string('password',200);
            $table->string('active_status',20);
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
        Schema::dropIfExists('zonepartners');
    }
};
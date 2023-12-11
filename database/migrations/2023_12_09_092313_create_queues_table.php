<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration
{
    // database/migrations/YYYY_MM_DD_create_queues_table.php

    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->enum('status', ['waiting', 'serving', 'completed'])->default('waiting');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('queues');
    }
}

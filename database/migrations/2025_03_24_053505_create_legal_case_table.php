<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('status');
            $table->string('payment_status');
            $table->foreignId('lawyer_id')->constrained('mahasiswas')->onDelete('cascade'); // Add onDelete('cascade')
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cases');
    }
};

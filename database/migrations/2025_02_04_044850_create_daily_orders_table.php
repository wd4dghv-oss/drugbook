<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('daily_orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('bht_no');
            $table->string('drug_name');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('daily_orders');
    }
};


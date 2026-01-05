<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drug_receives', function (Blueprint $table) {
            
            $table->id(); // Auto-incrementing primary key
            $table->date('date'); // The date when the drug was received
            $table->string('drug_name'); // Drug name
            $table->integer('quantity'); // Received quantity
            $table->date('expiry_date'); // Expiry date
            
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_receives');
    }
};

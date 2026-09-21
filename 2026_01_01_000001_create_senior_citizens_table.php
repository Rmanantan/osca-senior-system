<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('senior_citizens', function (Blueprint $table) {
            $table->id();
            $table->string('osca_id', 50)->unique();
            $table->string('first_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100);
            $table->date('birth_date');
            $table->enum('sex', ['Male','Female']);
            $table->string('barangay', 150);
            $table->text('address')->nullable();
            $table->string('contact_number', 30)->nullable();
            $table->boolean('philhealth')->default(false);
            $table->string('pension_status', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('senior_citizens');
    }
};

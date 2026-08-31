<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('created_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->date('prescription_date');

            // Right eye / OD
            $table->decimal('right_sphere', 5, 2)->nullable();
            $table->decimal('right_cylinder', 5, 2)->nullable();
            $table->unsignedSmallInteger('right_axis')->nullable();
            $table->decimal('right_add', 5, 2)->nullable();

            // Left eye / OS
            $table->decimal('left_sphere', 5, 2)->nullable();
            $table->decimal('left_cylinder', 5, 2)->nullable();
            $table->unsignedSmallInteger('left_axis')->nullable();
            $table->decimal('left_add', 5, 2)->nullable();

            // Supports values such as "62" or "31/31".
            $table->string('pd', 20)->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['patient_id', 'prescription_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
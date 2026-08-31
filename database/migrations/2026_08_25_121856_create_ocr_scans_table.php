<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ocr_scans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('performed_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->string('source', 20);
            $table->string('status', 20)->default('processing');

            $table->decimal('confidence', 5, 2)->nullable();

            $table->unsignedInteger('processing_time_ms')->nullable();

            $table->text('error_message')->nullable();

            $table->timestamp('processed_at')->nullable();

            $table->timestamps();

            $table->index(['patient_id', 'created_at']);
            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ocr_scans');
    }
};
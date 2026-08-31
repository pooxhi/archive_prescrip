<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->dropIndex(['patient_id', 'prescription_date']);
        });

        Schema::table('prescriptions', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
        });

        Schema::table('prescriptions', function (Blueprint $table) {
            $table->dropColumn('patient_id');

            $table->string('customer')->after('id');
            $table->string('address')->nullable()->after('customer');
            $table->string('reference_number')->nullable()->after('address');

            $table->decimal('amount_due', 10, 2)->nullable()->after('notes');
        });
    }

    public function down(): void
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->dropColumn([
                'customer',
                'address',
                'reference_number',
                'amount_due',
            ]);
        });

        Schema::table('prescriptions', function (Blueprint $table) {
            $table->foreignId('patient_id')
                ->nullable()
                ->constrained()
                ->restrictOnDelete();

            $table->index(['patient_id', 'prescription_date']);
        });
    }
};
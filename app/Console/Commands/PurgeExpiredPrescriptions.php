<?php

namespace App\Console\Commands;

use App\Models\ActivityLog;
use App\Models\Prescription;
use Illuminate\Console\Command;

class PurgeExpiredPrescriptions extends Command
{
    protected $signature = 'prescriptions:purge-expired
                            {--dry-run : Show what would be deleted without deleting anything}';

    protected $description = 'Permanently delete prescriptions that have exceeded the retention period.';

    public function handle(): int
    {
        $retentionYears = config('prescriptions.retention_years', 10);

        $cutoffDate = now()
            ->subYears($retentionYears)
            ->startOfDay();

        $prescriptions = Prescription::onlyTrashed()
            ->whereDate('deleted_at', '<=', $cutoffDate)
            ->get();
            
        if ($prescriptions->isEmpty()) {
            $this->info("No prescriptions are eligible for permanent deletion.");

            return self::SUCCESS;
        }

        $this->info(
            "Found {$prescriptions->count()} prescription(s) eligible for permanent deletion."
        );

        foreach ($prescriptions as $prescription) {
            $this->line(
                "Prescription #{$prescription->id} — {$prescription->customer}"
            );

            if ($this->option('dry-run')) {
                continue;
            }

            ActivityLog::where('subject_type', Prescription::class)
                ->where('subject_id', $prescription->id)
                ->delete();

            $prescription->forceDelete();
        }

        if ($this->option('dry-run')) {
            $this->warn('Dry run only. No records were permanently deleted.');
        } else {
            $this->info('Permanent deletion completed.');
        }

        return self::SUCCESS;
    }
}
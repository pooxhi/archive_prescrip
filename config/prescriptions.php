<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Prescription Retention Period
    |--------------------------------------------------------------------------
    |
    | Number of years a prescription record may be retained before it becomes
    | eligible for permanent deletion.
    |
    */

    'retention_years' => (int) env('PRESCRIPTION_RETENTION_YEARS', 10),
];
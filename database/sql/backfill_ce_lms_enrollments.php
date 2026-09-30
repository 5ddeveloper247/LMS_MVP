<?php

require __DIR__ . '/../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Modules\ContinuingEducation\Services\CeEnrollmentService;

$userId = isset($argv[1]) ? (int) $argv[1] : null;

$created = app(CeEnrollmentService::class)->backfillLmsEnrollments($userId);

echo $userId
    ? "Backfill complete for user {$userId}. New LMS enrollments: {$created}\n"
    : "Backfill complete. New LMS enrollments: {$created}\n";

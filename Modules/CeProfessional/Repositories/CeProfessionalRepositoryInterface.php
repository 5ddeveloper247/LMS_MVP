<?php

namespace Modules\CeProfessional\Repositories;

use Modules\CeProfessional\Entities\CeProfessional;

interface CeProfessionalRepositoryInterface
{
    public function create(array $attributes): CeProfessional;

    public function findByUserId(int $userId): ?CeProfessional;
}

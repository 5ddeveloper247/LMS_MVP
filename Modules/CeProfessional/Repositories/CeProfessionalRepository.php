<?php

namespace Modules\CeProfessional\Repositories;

use Modules\CeProfessional\Entities\CeProfessional;

class CeProfessionalRepository implements CeProfessionalRepositoryInterface
{
    protected $ceProfessional;

    public function __construct(CeProfessional $ceProfessional)
    {
        $this->ceProfessional = $ceProfessional;
    }

    public function create(array $attributes): CeProfessional
    {
        return $this->ceProfessional->create($attributes);
    }

    public function findByUserId(int $userId): ?CeProfessional
    {
        return $this->ceProfessional->newQuery()->where('user_id', $userId)->first();
    }
}

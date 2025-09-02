<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class HowProgramsWork extends Model
{
    use Tenantable;

    protected $table = 'how_programs_work';

    protected $fillable = [];

}

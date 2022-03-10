<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrcInfo extends Model
{
    use HasFactory;

    public function orcs()
    {
        return $this->hasMany(Orc::class, 'orc_id');
    }
}

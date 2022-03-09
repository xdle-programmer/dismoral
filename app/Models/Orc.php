<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Helpers\HttpRequest;

class Orc extends Model
{
    use HasFactory;

    protected $table = 'orcs';
    protected $fillable = [
        'link', 'net', 'comment', 'orc_id'
    ];

    public function info()
    {
        return $this->belongsTo(OrcInfo::class, 'orc_id');
    }
}

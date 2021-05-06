<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recognition extends Model
{
    use SoftDeletes;

    public $table = 'recognitions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_usuario',
        'intento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id_tanya_jawab', 'id_user', 'komentar', 'flag'
    ];

    public $timestamps = false;
}

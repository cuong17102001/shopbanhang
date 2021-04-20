<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'title','image','description','content'
    ];
}

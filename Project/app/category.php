<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class category extends Model
{
    protected $primaryKey = 'cat_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}

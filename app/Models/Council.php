<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName(){
        return 'uri';
    }
}

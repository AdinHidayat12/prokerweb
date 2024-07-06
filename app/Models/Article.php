<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName(){
        return 'uri';
    }

    public function scopeFilter($query, array $filters){
        if(isset($filters['cari'])? $filters['cari']: false){
             return $query->where('judul', 'like', '%'.$filters['cari'].'%');
        }
    }
}

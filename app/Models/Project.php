<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // use HasFactory;
    protected $table ='projects';

    // public function cart(){
    //     return $this->hasMany(Cart::class);
    // }

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
    }

    protected $fillable =['name', 'start_date', 'end_date', 'client_name', 'location', 'price', 'status', 'description'];
}

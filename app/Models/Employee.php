<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // use HasFactory;
    protected $table ='employees';

    // public function cart(){
    //     return $this->hasMany(Cart::class);
    // }

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')->
                orWhere('email', 'like', '%' . request('search') . '%');
        }
    }

    protected $fillable =['name','phone', 'email', 'age', 'gender', 'position', 'address'];
}

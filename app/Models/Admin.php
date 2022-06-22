<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table ='admins';

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')->
                orWhere('email', 'like', '%' . request('search') . '%');
        }
    }

    // public function cart(){
    //     return $this->hasMany(Cart::class);
    // }

    protected $fillable =['name','email','password'];
}

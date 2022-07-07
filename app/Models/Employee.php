<?php

namespace App\Models;

use App\Models\PositionType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function boot()
    {
       parent::boot();
       static::creating(function(Employee $employee)
       {
           $user = Auth::user();
           $employee->created_by = $user->name;
           $employee->updated_by = $user->name;
       });
       static::updating(function(Employee $project)
       {
           $user = Auth::user();
           $project->updated_by = $user->name;
       });
   }

    public function position(){
        return $this->belongsTo(PositionType::class, 'position_type_id');
    }

    protected $fillable =['position_type_id', 'name','phone', 'email', 'age', 'gender', 'address'];
}

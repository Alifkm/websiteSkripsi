<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function boot()
    {
       parent::boot();
       static::creating(function(Project $project)
       {
           $user = Auth::user();
           $project->created_by = $user->name;
           $project->updated_by = $user->name;
       });
       static::updating(function(Project $project)
       {
           $user = Auth::user();
           $project->updated_by = $user->name;
       });
   }

    protected $fillable =['name', 'start_date', 'end_date', 'client_name', 'location', 'price', 'status', 'description'];
}

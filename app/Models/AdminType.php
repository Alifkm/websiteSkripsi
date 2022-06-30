<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminType extends Model
{
    // use HasFactory;
    protected $table ='admin_types';

    public function admin(){
        return $this->hasOne(Admin::class);
    }

    protected $fillable =['admin_type_name'];
}

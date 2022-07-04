<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PositionType extends Model
{
    use HasFactory;
    protected $table ='position_types';

    public function employee(){
        return $this->hasOne(Employee::class);
    }

    protected $fillable =['position_name'];
}

<?php

namespace App\Models;

use App\Models\TransactionType;
use App\Models\TransactionSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    // use HasFactory;

    protected $table ='transactions';

    public function transactionType(){
        return $this->hasOne(TransactionType::class);
    }

    public function transactionSource(){
        return $this->hasOne(TransactionSource::class);
    }

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('transaction_name', 'like', '%' . request('search') . '%');
        }
    }

    protected $fillable =['transaction_name', 'date', 'total'];
}

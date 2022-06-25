<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionSource extends Model
{
    // use HasFactory;
    protected $table ='transaction_sources';

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    protected $fillable =['transaction_source_name'];
}

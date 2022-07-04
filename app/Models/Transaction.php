<?php

namespace App\Models;

use App\Models\TransactionType;
use App\Models\TransactionSource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    // use HasFactory;

    protected $table ='transactions';

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('transaction_name', 'like', '%' . request('search') . '%')
                    ->orWhere('date', 'like', '%' . request('search') . '%');
        }
    }

    public function transactionTypes(){
        return $this->belongsTo(TransactionType::class, 'transaction_type_id');
    }

    public function transaction_sources(){
        return $this->belongsTo(TransactionSource::class, 'transaction_source_id');
    }

    public static function boot()
    {
       parent::boot();
       static::creating(function(Transaction $transaction)
       {
           $user = Auth::user();
           $transaction->created_by = $user->name;
           $transaction->updated_by = $user->name;
       });
       static::updating(function(Transaction $transaction)
       {
           $user = Auth::user();
           $transaction->updated_by = $user->name;
       });
   }

    protected $fillable =['transaction_type_id', 'transaction_source_id', 'transaction_name', 'date', 'total'];
}

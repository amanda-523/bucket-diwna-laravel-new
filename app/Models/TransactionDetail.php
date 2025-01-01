<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const STATUS_PROCESS = 'PROCESS';
    const STATUS_SHIPPING = 'SHIPPING';
    const STATUS_SUCCESS = 'SUCCESS';
    const STATUS_DONE = 'DONE';

    protected $fillable = [
        'transactions_id',
        'products_id',
        'price',
        'shipping_status',
        'resi',
        'code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($transactionDetail) {
            if ($transactionDetail->isDirty('resi') && !empty($transactionDetail->resi)) {
                $transactionDetail->shipping_status = self::STATUS_SHIPPING;
            }
        });
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }
}

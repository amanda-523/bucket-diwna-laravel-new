<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'name',
        'address',
        'provinces_id',
        'regencies_id',
        'zip_code',
        'country',
        'phone_number',
        'is_selected'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'addresses_id', 'id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'id');
    }

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'regencies_id', 'id');
    }
}

<?php

namespace App\Models;

use App\Models\PaymentTrack;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'reserve_for',
        'category',
        'personCount',
        'time',
        'check_in',
        'check_out',
    ];

    public function productImages()
    {
        return $this->hasMany(PaymentTrack::class, 'customer_id', 'id');
    }
}

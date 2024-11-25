<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Customer;

class PaymentTrack extends Model
{
    protected $table = 'payment_tracks';
    protected $fillable = [
        'payment_method',
        'amount',
        'status',
        'trans_date',
        'user_id',
        'customer_id',
    ];



    public function category()
    {
        return $this->belongsTo(Customer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    protected $fillable = [
        'courier_id',
        'tracking_number',
        'sender_name',
        'receiver_name',
        'pickup_address',
        'delivery_address',
        'shipping_cost',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'courier_id'=>'integer',
        'tracking_number'=>'string',
        'sender_name'=>'string',
        'receiver_name'=>'string',
        'pickup_address'=>'string',
        'delivery_address'=>'string',
        'shipping_cost'=>'double',
    ];
    public function courier():BelongsTo
    {
        return $this->belongsTo(Admin::class,foreignKey: 'courier_id')->where('user_type','courier');
    }
}

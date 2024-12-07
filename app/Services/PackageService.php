<?php

namespace App\Services;

class PackageService
{
    public function getAddUpdateData(object|array $request):array
    {
        return [
            'courier_id'     => $request['courier_id'],
            'tracking_number'    => $request['lastTrackingData'],
            'sender_name'    => $request['sender_name'],
            'receiver_name'    => $request['receiver_name'],
            'pickup_address'    => $request['pickup_address'],
            'delivery_address'    => $request['delivery_address'],
            'shipping_cost'    => $request['shipping_cost'],
            'status'  => $request['status'] ?? 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

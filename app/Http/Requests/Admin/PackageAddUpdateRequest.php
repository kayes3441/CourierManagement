<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PackageAddUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'courier_id' => 'required',
            'sender_name' => 'required',
            'receiver_name' => 'required',
            'pickup_address' => 'required',
            'delivery_address' => 'required',
            'shipping_cost' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'courier_id.required' => 'Courier Id is required',
            'sender_name.required' => 'Sender Name is required',
            'receiver_name.required' => 'Receiver Name is required',
            'pickup_address.required' => 'Pickup Address is required',
            'delivery_address.required' => 'Delivery Address is required',
            'shipping_cost.required' => 'Shipping Cost is required',
        ];
    }
}

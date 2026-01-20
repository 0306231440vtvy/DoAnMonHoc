<?php

namespace App\Http\Requests\Client\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CheckoutRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:100',

            'phone' => [
                'required',
                'regex:/^(0|\+84)[0-9]{9,10}$/'
            ],

            'email' => 'required|email|max:255',

            'province_id' => 'required',
            'ward_id' => 'required',

            // 'address' => 'required|string|min:3|max:255',
            'payment_method' => 'required|in:cod,bank',
            'note'=> 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.min' => 'Họ tên quá ngắn',

            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không hợp lệ',

            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',

            'province_id.required' => 'Chọn tỉnh',
            'ward_id.required' => 'Chọn xã/phường',

            // 'address.required' => 'Vui lòng nhập địa chỉ/số nhà cụ thể',
            // 'address.min' => 'vị trí cụ thể quá ngắn',

            'payment_method.required' => 'Vui lòng chọn phương thức thanh toán'
        ];
    }
}

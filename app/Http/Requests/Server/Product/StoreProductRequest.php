<?php

namespace App\Http\Requests\Server\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProductRequest extends FormRequest
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
            'tensp' => 'required|string|max:255',
            'giaban' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'soluong' => 'nullable|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'thuonghieu_id' => 'required|exists:thuonghieu,id',
            'hinhnen' => 'nullable|string',
            'album' => 'nullable|array',
            'mota' => 'nullable|string',
            // // Variants
            // 'variants' => 'nullable|array',
            // 'variants.*.sku' => 'required_with:variants|string|max:50',
            // 'variants.*.giaban' => 'required_with:variants|numeric|min:0',
            // 'variants.*.soluong' => 'required_with:variants|integer|min:0',
            // 'variants.*.attributes_json' => 'required_with:variants|string',
        ];
    }
    public function messages(): array
    {
        return [
            'tensp.required' => 'Tên sản phẩm là bắt buộc',
            'giaban.required' => 'Giá bán là bắt buộc',
            'category_id.required' => 'Danh mục là bắt buộc',
            'thuonghieu_id.required' => 'Thương hiệu là bắt buộc',

            // 'variants.*.sku.required_with' => 'SKU biến thể là bắt buộc',
            // 'variants.*.giaban.required_with' => 'Giá biến thể là bắt buộc',
            // 'variants.*.soluong.required_with' => 'Số lượng biến thể là bắt buộc',
            // 'variants.*.attributes_json.required_with' => 'Thuộc tính biến thể là bắt buộc',
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->tensp)
        ]);
    }
}

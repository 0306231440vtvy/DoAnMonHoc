<?php

namespace App\Http\Requests\Server\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateProductRequest extends FormRequest
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
            'tensp' => 'required|string|min:4|max:255',
            'slug' => 'required|string|unique:sanpham,slug',
            'sku' => 'nullable|string|unique:sanpham,sku|max:50',
            'soluong' => 'required|integer|min:1',
            'giaban' => 'required|numeric|min:1000',
            'discount' => 'nullable|numeric|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'thuonghieu_id' => 'required|exists:thuonghieu,id',
            'bienthe_id.*' => 'exists:bienthe,id',
            'mota' => 'nullable|string',
            'trangthai' => 'nullable|integer|gte:1|lte:2',
        ];
    }
    public function messages(): array
    {
        return [
            'tensp.required' => 'Tên sản phẩm là bắt buộc',
            'tensp.min' => 'Tên sản phẩm phải có ít nhất 4 ký tự',
            'tensp.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
            'sku.unique' => 'Mã SKU đã tồn tại',
            'soluong.required' => 'Số lượng là bắt buộc',
            'soluong.integer' => 'Số lượng phải là số nguyên',
            'soluong.min' => 'Số lượng không được nhỏ hơn 0',
            'giaban.required' => 'Giá bán là bắt buộc',
            'giaban.numeric' => 'Giá bán phải là số',
            'giaban.min' => 'Giá bán không được nhỏ hơn 0',
            'discount.numeric' => 'Giảm giá phải là số',
            'discount.min' => 'Giảm giá không được nhỏ hơn 0',
            'discount.max' => 'Giảm giá không được lớn hơn 100',
            'category_id.required' => 'Danh mục là bắt buộc',
            'category_id.exists' => 'Danh mục không tồn tại',
            'thuonghieu_id.required' => 'Thương hiệu là bắt buộc',
            'thuonghieu_id.exists' => 'Thương hiệu không tồn tại',
            'bienthe_id.*.exists' => 'Biến thể không tồn tại',
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->tensp)
        ]);
    }
}

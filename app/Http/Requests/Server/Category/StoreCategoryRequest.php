<?php

namespace App\Http\Requests\Server\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'required|string',
            'publish' => 'integer|gte:1|lte:2',
            'desceiption' => 'string'
        ];
    }
    public function perpageForvalidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name)
        ]);
    }
}

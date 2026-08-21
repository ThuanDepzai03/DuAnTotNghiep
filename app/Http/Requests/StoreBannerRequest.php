<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'title_font_size' => ['required', 'integer', 'min:12', 'max:72'],
            'subtitle_font_size' => ['required', 'integer', 'min:10', 'max:36'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'link' => ['nullable', 'string', 'max:2048'],
            'type' => ['required', Rule::in(['hero', 'static_full', 'static_rect'])],
            'position' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Vui lòng chọn ảnh banner.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng JPG, PNG hoặc WEBP.',
            'image.max' => 'Ảnh banner không được vượt quá 2MB.',
            'type.in' => 'Loại banner không hợp lệ.',
            'position.integer' => 'Thứ tự phải là số nguyên.',
            'position.min' => 'Thứ tự không được nhỏ hơn 0.',
            'status.boolean' => 'Trạng thái không hợp lệ.',
        ];
    }
}

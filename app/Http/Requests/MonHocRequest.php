<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonHocRequest extends FormRequest
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
            'TenMH' => 'required',
            'Lop' => 'required',
            'LT'=>'integer|required',
            'TH'=>'integer|required',
            'NgayThi'=>'date|nullable',
            'NgayThanhToan'=>'date|nullable'
        ];
    }
    public function messages()
    {
        return [
            'TenMH.required' => 'Bạn phải nhập tên môn học',
            'Lop.required' => 'Bạn phải nhập tên lớp',
            'LT.required'=>'Bạn phải nhập số tiết Lý Thuyết',
            'LT.integer'=>'Số tiết Lý Thuyết phải là số nguyên',
            'TH.required'=>'Bạn phải nhập số tiết Thực Hành',
            'TH.integer'=>'Số tiết Thực Hành phải là số nguyên',
            'NgayThi.date'=>'Ngày thi sai định dạng',
            'NgayThanhToan' =>'Ngày thanh toán sai định dạng'
        ];
    }
}

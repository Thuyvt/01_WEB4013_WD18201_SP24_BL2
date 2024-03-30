<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:25'],// rule dạng mảng bat buộc thỏa mãn hết
            'identify_id' => 'required|digits_between:9,10',// rule dạng bail gặp phải lỗi dừng lại ngay
            'date_of_birth' => ['required', 'date']
        ];
    }

    // Tự định nghĩa lỗi
    public function messages()
    {
        // Check lỗi và trả vef message tương ứng
        return [
            "name.required" => "Phải nhập họ và tên",
            "name.min" => "Họ và ten lớn hơn 2 ký tự",
            "name.max" => "Họ và tên nhiều nhất 25 ký tự",
            "identify_id.required" => "Phải nhập chứng minh thư",
            "identify_id.digits_between" => "Số chứng minh thư không được chứa ký tự"
        ];
    }
}

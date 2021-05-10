<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ပစ္စည်းအမည် ဖြည့်သွင်းပါ။',
            'price.required' => '‌ဈေးနှုန်း ဖြည့်သွင်းပါ။',
            'name.string' => 'ပစ္စည်းအမည်ကို စာဖြင့် ဖြည့်သွင်းပါ။',
            'price.numeric' => 'ဈေးနှုန်းကို ဂဏန်းဖြင့် ဖြည့်သွင်းပါ။'
        ];
    }
}

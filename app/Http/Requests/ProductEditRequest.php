<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'price' => 'sometimes|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.sometimes' => 'ပစ္စည်းအမည် ဖြည့်သွင်းပါ။',
            'price.sometimes' => '‌ဈေးနှုန်း ဖြည့်သွင်းပါ။',
            'name.string' => 'ပစ္စည်းအမည်ကို စာဖြင့် ဖြည့်သွင်းပါ။',
            'price.numeric' => 'ဈေးနှုန်းကို ဂဏန်းဖြင့် ဖြည့်သွင်းပါ။'
        ]; 
    }


}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountFormRequest extends FormRequest
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
            'typeDiscount' => 'required',
            'nameBank' => 'required',
            'nameSender' => 'required',
            'dateDiscount' => 'required',
            'priceDiscount' => 'required',
            'recipeType' => 'required',
            'cat',
            'description'
            //
        ];
    }
}

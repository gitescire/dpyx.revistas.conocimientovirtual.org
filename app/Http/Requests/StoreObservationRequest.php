<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreObservationRequest extends FormRequest
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
            // 'files' => 'mimes:jpeg,bmp,png,gif,pdf,application/pdf|size:10000',
            // 'files' => 'size:10000',
            'files[*]' => 'mimes:jpeg,bmp,png,jpg,pdf,application/pdf|size:10000',
        ];
    }
}

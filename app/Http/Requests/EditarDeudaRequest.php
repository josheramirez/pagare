<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  EditarDeudaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('digitador');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'total' => 'required|numeric',
            'n_cuota' => 'numeric|nullable'
        ];
    }
}

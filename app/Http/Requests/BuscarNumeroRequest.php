<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarNumeroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('digitador') || $this->user()->can('supervisor');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numeracion' => 'required|numeric|exists:pagares,numeracion'
        ];
    }

    public function messages()
    {
        return [
            'numeracion.exists' => 'Pagare no encontrado',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarCodigoRequest extends FormRequest
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
            'codigo' => 'required|numeric|exists:pagares,codigo'
        ];
    }

    public function messages()
    {
        return [
            'codigo.exists' => 'Pagare no encontrado',
        ];
    }
}

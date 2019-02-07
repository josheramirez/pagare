<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearPagoRequest extends FormRequest
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
            'n_cuota' => 'required|numeric',
            'monto' => 'required|numeric',
            'f_pago' => 'required|date',
            'detalle' => 'nullable|max:80',
            'n_boleta' => 'required|numeric'
        ];
    }
}

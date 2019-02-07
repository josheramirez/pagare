<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarServicioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('administrador') || $this->user()->can('supervisor');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|unique:servicios,nombre,' . $this->servicio->id,
        ];
    }
}

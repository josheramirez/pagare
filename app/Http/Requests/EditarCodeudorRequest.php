<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarCodeudorRequest extends FormRequest
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
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'rut' => 'cl_rut|nullable',
            'pasaporte' => 'required_without:rut',
        ];
    }
}

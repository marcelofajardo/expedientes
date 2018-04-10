<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UepRequest extends FormRequest
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
        $uep = $this->route('uep');

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'nombre'       => 'required|min:4|max:100|unique:uep,nombre',
                    'emails'       => 'required|email|unique:uep,email',
                    'domicilio'    => 'nullable',
                    'telefono'     => 'nullable',
                    'provincia_id' => 'nullable|exists:provincia,id',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'nombre'       => 'required|min:4|max:100|unique:uep,nombre',
                    'emails'       => 'required|email|unique:uep,email,'.$uep->email,
                    'domicilio'    => 'nullable',
                    'telefono'     => 'nullable',
                    'provincia_id' => 'required|exists:provincia,id',
                ];
            }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Deberá completar el nombre de la UEP',
            'nombre.unique' => 'Ya existe una UEP con ese nombre',
            'emails.required' => 'Deberá completar el email',
            'emails.unique' => 'Ya existe una UEP con este email',
            'required.required' => 'Deberá completar la Provincia de la UEP',
        ];
    }
}

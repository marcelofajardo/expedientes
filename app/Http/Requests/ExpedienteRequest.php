<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteRequest extends FormRequest
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
        $expediente = $this->route('expediente');

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'caratula'               => 'required',
                    'usuario'                => 'nullable',
                    'nombre_usuario'         => 'nullable',
                    'rol_usuario'            => 'nullable',
                    'fecha'                  => 'required',
                    'slug'                   => 'nullable',
                    'user_id'                => 'nullable|exists:users,id',
                    'tipo_expediente_id'     => 'required|exists:tipoexpediente,id',

                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                  'caratula'               => 'required|unique:expediente,caratula,' . $expediente->id,
                  'usuario'                => 'nullable',
                  'nombre_usuario'         => 'nullable',
                  'rol_usuario'            => 'nullable',
                  'fecha'                  => 'required',
                  'slug'                   => 'nullable',
                  'slug'                   => 'nullable|unique:expediente,slug,' . $expediente->id,
                  'user_id'                => 'nullable|exists:users,id',
                  'tipo_expediente_id'     => 'required|exists:tipoexpediente,id',
                ];
            }
            default:
                break;
        }
    }
}

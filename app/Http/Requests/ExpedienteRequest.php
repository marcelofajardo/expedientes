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
                    'usuario'                => 'required',
                    'nombre_usuario'         => 'required',
                    'rol_usuario'            => 'required',
                    'fecha'                  => 'required',
                    'user_id'                => 'required|exists:users,id',
                    'tipo_expediente_id'     => 'required|exists:tipoexpediente,id',

                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                  'caratula'               => 'required',
                  'usuario'                => 'required',
                  'nombre_usuario'         => 'required',
                  'rol_usuario'            => 'required',
                  'fecha'                  => 'required',
                  'user_id'                => 'required|exists:users,id',
                  'tipo_expediente_id'     => 'required|exists:tipoexpediente,id',
                ];
            }
            default:
                break;
        }
    }
}

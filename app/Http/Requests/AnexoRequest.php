<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnexoRequest extends FormRequest
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
        $rol = $this->route('rol');

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'descripcion'        => 'nullable',
                    'user_id'            => 'nullable|exists:users,id',
                    'clasificacion_id'   => 'nullable|exists:clasificacion_anexo,id',
                    'expediente_id'      => 'required|exists:expediente,id',
                    'username'            => 'nullable',
                    'url'                => 'nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                  'descripcion'        => 'nullable',
                  'user_id'            => 'nullable|exists:users,id',
                  'clasificacion_id'   => 'nullable|exists:clasificacion_anexo,id',
                  'expediente_id'      => 'required|exists:expediente,id',
                  'username'            => 'nullable',
                  'url'                => 'nullable',
                ];
            }
            default:
                break;
        }
    }
}

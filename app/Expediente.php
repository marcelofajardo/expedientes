<?php

namespace App;
use Carbon\Carbon;
use App\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Expediente extends Model
{
    use SoftDeletes;

	/**
     * Setea la Tabla a la que pertenece el modelo
     *
     * @var string
     */
    protected $table = 'expediente';

    protected $dates = ['deleted_at', 'fecha'];

    /**
     * Asignación masiva de atributos para la insecion
     *
     * @var array
     */

    protected $fillable = ['fecha', 'caratula', 'usuario', 'nombre_usuario', 'rol_usuario', 'slug', 'user_id', 'tipo_expediente_id'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Normaliza y setea el nombre y el slug del Articulo
     *
     * @param $val
     */
    public function setCaratulaAttribute($val)
    {
    //	setlocale(LC_TIME, 'es_ES.UTF-8');
        $this->attributes['caratula'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . '-'. rand(5,10);

    }

    public function setFechaAttribute($val)
    {
      $this->attributes['fecha'] = Carbon::parse($val)->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo('App\User');

    }
    public function tipoexpediente()
    {
        return $this->belongsTo('App\TipoExpediente', 'tipo_expediente_id');
    }

    static::updating(function($expediente)
    {

        foreach ($expediente->getDirty() as $key => $value) {
            $control = new Logs;
            $control->user_id = Auth::user()->id;
            $control->usernam = Auth::user()->username;
            $control->expediente_id = $expediente->id;
            $control->campo = $key;
            $control->valor_anterior = $expediente->getOriginal($key);
            $control->valor_nuevo = $value;
            $control->save();
        }

    });


}

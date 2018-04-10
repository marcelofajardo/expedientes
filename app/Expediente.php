<?php

namespace App;

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
    public function setNombreAttribute($val)
    {
    //	setlocale(LC_TIME, 'es_ES.UTF-8');
      //  $this->attributes['nombre'] = strtolower(trim($val));
        $this->attributes['slug'] = str_slug($val) . '-'. rand(5,10);
    }

    public function user()
    {
        return $this->belongsTo('App\User');

    }
    public function tipoexpediente()
    {
        return $this->belongsTo('App\TipoExpediente', 'tipo_expediente_id');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Notificacion extends Model
{
    use SoftDeletes;

	/**
     * Setea la Tabla a la que pertenece el modelo
     *
     * @var string
     */
    protected $table = 'notificaciones';

    protected $dates = ['deleted_at'];

    /**
     * Asignación masiva de atributos para la insecion
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'slug', 'user_id'];

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
        $this->attributes['nombre'] = strtolower(trim($val));
        $this->attributes['slug'] = str_slug($val) . '-'. rand(5,10);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}

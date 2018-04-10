<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uep extends Model
{
	use SoftDeletes;

	/**
     * Setea la Tabla a la que pertenece el modelo
     *
     * @var string
     */
    protected $table = 'uep';

    protected $dates = ['deleted_at'];

    /**
     * Asignación masiva de atributos para la insecion
     *
     * @var array
     */
    protected $fillable = ['nombre', 'email', 'domicilio', 'telefono', 'provincia_id', 'slug'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function provincia()
    {
        return $this->belongsTo('App\Provincia', 'provincia_id');
    }

    /**
     * Normaliza y setea el nombre y el slug del Articulo
     *
     * @param $val
     */
    public function setNombreAttribute($val)
    {
    	setlocale(LC_TIME, 'es_ES.UTF-8');
        $this->attributes['nombre'] = strtoupper(trim($val));
        $this->attributes['slug'] = str_slug($val);
    }

    public function user()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}

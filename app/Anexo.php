<?php

namespace App;
use Carbon\Carbon;
//use App\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Anexo extends Model
{
    use SoftDeletes;

	/**
     * Setea la Tabla a la que pertenece el modelo
     *
     * @var string
     */
    protected $table = 'anexo';

    protected $dates = ['deleted_at'];

    /**
     * Asignación masiva de atributos para la insecion
     *
     * @var array
     */

    protected $fillable = ['expediente_id', 'clasificacion_id', 'username', 'descripcion', 'slug', 'user_id'];

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
     /*
    public function setCaratulaAttribute($val)
    {
    //	setlocale(LC_TIME, 'es_ES.UTF-8');
        $this->attributes['caratula'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . '-'. rand(5,10);

    }
*/

    public function user()
    {
        return $this->belongsTo('App\User');

    }
    public function clasificacion()
    {
        return $this->belongsTo('App\ClasificacionAnexo', 'clasificacion_id');
    }

}

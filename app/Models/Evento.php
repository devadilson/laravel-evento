<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa_id',
        'campu_id',
        'name',
        'slug',
        'description',
        'palestrante',
        'publico',
        'data',
        'carga_horaria',
        'horario',
        'local',
        'local_url',
        'duracao',
        'capacidade',
        'recursos',
        'certificado',
        'certificado_url',
        'preview_url',
        'token',
        'logo',
        'active_certficado',
        'active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'empresa_id' => 'integer',
        'campu_id' => 'integer',
        'data' => 'date',
    ];


    public function participantes()
    {
        return $this->belongsToMany(\App\Models\Participante::class);
    }

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }

    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }

    public function campu()
    {
        return $this->belongsTo(\App\Models\Campu::class);
    }
}

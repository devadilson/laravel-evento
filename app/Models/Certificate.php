<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'texto_1',
        'texto_2',
        'texto_3',
        'texto_4',
        'texto_5',
        'carga_horaria',
        'assinatura_1_imagem',
        'assinatura_1_nome',
        'assinatura_1_texto',
        'assinatura_2_imagem',
        'assinatura_2_nome',
        'assinatura_2_texto',
        'assinatura_3_imagem',
        'assinatura_3_nome',
        'assinatura_3_texto',
        'empresa_logo',
        'evento_logo',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function evento()
    {
        return $this->hasOne(\App\Models\Evento::class);
    }
}

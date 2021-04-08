<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

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

    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";
        // destination path relative to the disk above
        $destination_path = "public/evento";
        
        // if the image was erased
        if ($value==null) {

            // delete the image from disk
            Storage::delete(Str::replaceFirst('storage/','public/', $this->{$attribute_name}));
            
            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // 0. Make the image
            $image = Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';

            // 2. Store the image on disk.
            Storage::put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            Storage::delete(Str::replaceFirst('storage/','public/', $this->{$attribute_name}));

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            //$public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
            $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Phone extends Model
{
    //
    protected $guarded = [];//para que no se proteja ningun campo

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function phones(): HasMany
    {
        //1 - 1
       // return $this->hasOne(Phone::class );
       //Si no se respeta la nomenclatura de nombres, Laravel no sabe a qué clave se refiere habría que ponerlo de la siguiente manera
        //return $this->hasOne(Phone::class, 'user_id', 'id' ); 

        //1 - n
        return $this->hasMany(Phone::class );
        //Si no se respeta la nomenclatura de nombres, Laravel no sabe a qué clave se refiere*/
        //return $this->hasMany(Phone::class /*, 'user_id', 'id' );
    }
}
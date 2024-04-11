<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    use HasFactory;

    protected $fillable = ['adresse', 'description', 'datedebut',
                            'datefin', 'budgetalloue', 'suivi', 'paroisse'];

    public function paroisse()
    {
        return $this->hasMany(Paroisse::class);
    }
    
}

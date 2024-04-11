<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'adresse', 'telephone', 'email', 'contratlocation', 'paroisse' ];

    public function paroisse()
    {
        return $this->hasMany(Paroisse::class);
    }
    
}

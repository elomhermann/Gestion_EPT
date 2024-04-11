<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = ['propriete', 'datedebut', 'datefin', 'durée', 'documentcontractuel', 'paroisse' ];

    public function paroisse()
    {
        return $this->hasMany(Paroisse::class);
    }

    public function propriete()
    {
        return $this->hasMany(Propriete::class);
    }
    
}

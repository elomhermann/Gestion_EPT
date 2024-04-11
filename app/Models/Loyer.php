<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loyer extends Model
{
    use HasFactory;

    protected $fillable = ['propriete', 'montantmensuel', 'montantannuel',
            'datedecheance', 'datepaiement', 'methodepaiement', 'statut', 'paroisse' ];

    public function paroisse()
    {
        return $this->hasMany(Paroisse::class);
    }

    public function propriete()
    {
        return $this->hasMany(Propriete::class);
    }
    
}

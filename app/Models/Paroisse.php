<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paroisse extends Model
{
    use HasFactory;

    protected $fillable = ['region', 'paroisse', 'adresse'];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class, 'contrat_id');
    }

    public function locataire()
    {
        return $this->belongsTo(Locataire::class, 'locataire_id');
    }

    public function loyer()
    {
        return $this->belongsTo(Loyer::class, 'loyer_id');
    }

    public function propriete()
    {
        return $this->belongsTo(Propriete::class, 'propriete_id');
    }

    public function maison()
    {
        return $this->belongsTo(Maison::class, 'maison_id');
    }

}

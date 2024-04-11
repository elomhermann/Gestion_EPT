<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriete extends Model
{
    use HasFactory;

    protected $fillable = ['paroisse', 'adresse', 'propriete', 'valeurlocative'];

    public function paroisse()
    {
        return $this->hasMany(Paroisse::class);
    }

    public function loyer()
    {
        return $this->belongsTo(Loyer::class, 'loyer_id');
    }

    public function contrat()
    {
        return $this->belongsTo(Contrat::class, 'contrat_id');
    }
    
}

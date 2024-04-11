<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propriete;
use App\Models\Loyer;
use App\Models\Locataire;
use App\Models\Contrat;
use App\Models\Paroisse;
use App\Models\Terrain;
use App\Models\Temple;
use App\Models\Maison;
use App\Models\Budget;
use App\Models\Salaire;

class HomeController extends Controller
{
    public function commande()
    {
        return view('commande');
    }

    public function propos()
    {
        return view('propos');
    }

    public function produits()
    {
        return view('produits');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function propriete()
    {
        $propriete = Propriete::latest()->paginate(5);
        return view('admin.propriete',compact('propriete'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function contrat()
    {
        $contrat = Contrat::latest()->paginate(5);
        return view('admin.contrat',compact('contrat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function locataire()
    {
        $locataire = Locataire::latest()->paginate(5);
        return view('admin.locataire',compact('locataire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function loyer()
    {
        $loyer = Loyer::latest()->paginate(5);
        return view('admin.loyer',compact('loyer'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function paroisse()
    {
        $paroisse = Paroisse::latest()->paginate(5);
        return view('admin.paroisse',compact('paroisse'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function terrain()
    {
        $terrain = Terrain::latest()->paginate(5);
        return view('admin.terrain',compact('terrain'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function temple()
    {
        $temple = Temple::latest()->paginate(5);
        return view('admin.temple',compact('temple'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function maison()
    {
        $maison = Maison::latest()->paginate(5);
        return view('admin.maison',compact('maison'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function budget()
    {
        $budget = Budget::latest()->paginate(5);
        return view('admin.budget',compact('budget'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function salaire()
    {
        $salaire = Salaire::latest()->paginate(5);
        return view('admin.salaire',compact('salaire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}



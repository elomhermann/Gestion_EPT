<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salaire;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class SalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaire = Salaire::latest()->paginate(5);
        return view('admin.salaire',compact('salaire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salaire.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'salaire' => 'required',
            'mois' => 'required',
        ]);

        Salaire::create($request->all());

        return redirect()->route('salaire.index')->with('success','Salaire créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salaire $salaire)
    {
        return view('salaire.show',compact('salaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salaire $salaire)
    {
        return view('salaire.edit',compact('salaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salaire $salaire)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'salaire' => 'required',
            'mois' => 'required',
        ]);

        $salaire->update($request->all());

        return redirect()->route('salaire.index')->with('success','Salaire modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salaire $salaire)
    {
        $salaire->delete();

        return redirect()->route('salaire.index')->with('success','Salaire supprimer avec succès');
    }

    public function exportSalaire()
    {
        $salaire = Salaire::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.salairepdf', compact('salaire')));
        $pdf->render();
        return $pdf->stream('salaires.pdf');
    }

    public function searchsalaire(Request $request)
    {
        $output = "";

        $salaire = Salaire::where('nom', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('prenom', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('poste', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('salaire', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('mois', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($salaire as $salaire)
        {
            $output .= '<tr>';
            $output .= '<td>' . $salaire->id . '</td>';
            $output .= '<td>' . $salaire->nom . '</td>';
            $output .= '<td>' . $salaire->prenom . '</td>';
            $output .= '<td>' . $salaire->poste . '</td>';
            $output .= '<td>' . $salaire->salaire . '</td>';
            $output .= '<td>' . $salaire->mois . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $salaire->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $salaire->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

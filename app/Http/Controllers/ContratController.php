<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrat;
use App\Models\Paroisse;
use App\Models\Propriete;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contrat = Contrat::latest()->paginate(5);
        return view('admin.contrat',compact('contrat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paroisse = Paroisse::all();
        $propriete = Propriete::all();
        return view('contrat.create',compact('paroisse','propriete'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'propriete' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'durée' => 'required',
            'documentcontractuel' => 'required',
            'paroisse' => 'required',
        ]);

        $paroisse = $request->input('paroisse', []);
        $paroisseString = implode(',', $paroisse);

        $propriete = $request->input('propriete', []);
        $proprieteString = implode(',', $propriete);

        Contrat::create([
            'propriete' => $proprieteString,
            'datedebut' => $request->input('datedebut'),
            'datefin' => $request->input('datefin'),
            'durée' => $request->input('durée'),
            'documentcontractuel' => $request->input('documentcontractuel'),
            'paroisse' => $paroisseString,
        ]);

        return redirect()->route('contrat.index')->with('success','Contrat créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrat $contrat)
    {
        return view('contrat.show',compact('contrat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrat $contrat)
    {
        return view('contrat.edit',compact('contrat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrat $contrat)
    {
        $request->validate([
            'propriete' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'durée' => 'required',
            'documentcontractuel' => 'required',
            'paroisse' => 'required',
        ]);

        $contrat->update($request->all());

        return redirect()->route('contrat.index')->with('success','Contrat modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrat $contrat)
    {
        $contrat->delete();

        return redirect()->route('contrat.index')->with('success','Contrat supprimer avec succès');
    }

    public function exportContrat()
    {
        $contrat = Contrat::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.contratpdf', compact('contrat')));
        $pdf->render();
        return $pdf->stream('contrats.pdf');
    }

    public function searchcontrat(Request $request)
    {
        $output = "";

        $contrat = Contrat::where('propriete', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datedebut', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datefin', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('durée', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('documentcontractuel', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('paroisse', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($contrat as $contrat)
        {
            $output .= '<tr>';
            $output .= '<td>' . $contrat->id . '</td>';
            $output .= '<td>' . $contrat->propriete . '</td>';
            $output .= '<td>' . $contrat->datedebut . '</td>';
            $output .= '<td>' . $contrat->datefin . '</td>';
            $output .= '<td>' . $contrat->durée . '</td>';
            $output .= '<td>' . $contrat->documentcontractuel . '</td>';
            $output .= '<td>' . $contrat->paroisse . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $contrat->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $contrat->id . '" class="btn btn-danger">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }

    public function uploadPdf(Request $request)
    {
        // Votre logique de traitement pour l'upload du fichier PDF ici
        
        // Exemple de traitement :
        if ($request->hasFile('documentcontractuel')) {
            $file = $request->file('documentcontractuel');
            // Manipulez le fichier comme vous le souhaitez, par exemple :
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            // Vous pouvez également stocker le chemin du fichier dans la base de données, etc.
        }
        
        return redirect()->back()->with('success', 'Le fichier PDF a été téléchargé avec succès.');
    }

}

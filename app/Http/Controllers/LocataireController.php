<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locataire;
use App\Models\Paroisse;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;


class LocataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locataire = Locataire::latest()->paginate(5);
        return view('admin.locataire',compact('locataire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paroisse = Paroisse::all();
        return view('locataire.create',compact('paroisse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'contratlocation' => 'required',
            'paroisse' => 'required',
        ]);

        $paroisse = $request->input('paroisse', []);
        $paroisseString = implode(',', $paroisse);

        Locataire::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'contratlocation' => $request->input('contratlocation'),
            'paroisse' => $paroisseString,
        ]);

        return redirect()->route('locataire.index')->with('success','Locataire créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Locataire $locataire)
    {
        return view('locataire.show',compact('locataire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locataire $locataire)
    {
        return view('locataire.edit',compact('locataire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Locataire $locataire)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'contratlocation' => 'required',
            'paroisse' => 'required',
        ]);

        $locataire->update($request->all());

        return redirect()->route('locataire.index')->with('success','Locataire modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locataire $locataire)
    {
        $locataire->delete();

        return redirect()->route('locataire.index')->with('success','Locataire supprimer avec succès');
    }

    public function exportLocataire()
    {
        $locataire = Locataire::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.locatairepdf', compact('locataire')));
        $pdf->render();
        return $pdf->stream('locataire.pdf');
    }

    public function searchlocataire(Request $request)
    {
        $output = "";

        $locataire = Locataire::where('nom', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('prenom', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('adresse', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('telephone', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('contratlocation', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('paroisse', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($locataire as $locataire)
        {
            $output .= '<tr>';
            $output .= '<td>' . $locataire->id . '</td>';
            $output .= '<td>' . $locataire->nom . '</td>';
            $output .= '<td>' . $locataire->prenom . '</td>';
            $output .= '<td>' . $locataire->adresse . '</td>';
            $output .= '<td>' . $locataire->telephone . '</td>';
            $output .= '<td>' . $locataire->email . '</td>';
            $output .= '<td>' . $locataire->contratlocation . '</td>';
            $output .= '<td>' . $locataire->paroisse . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $locataire->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $locataire->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

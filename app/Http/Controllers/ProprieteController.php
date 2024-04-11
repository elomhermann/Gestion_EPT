<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propriete;
use App\Models\Paroisse;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class ProprieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propriete = Propriete::latest()->paginate(5);
        return view('admin.propriete',compact('propriete'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paroisse = Paroisse::all();
        return view('propriete.create',compact('paroisse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paroisse' => 'required',
            'adresse' => 'required',
            'propriete' => 'required',
            'valeurlocative' => 'required',
        ]);

        $paroisse = $request->input('paroisse', []);
        $paroisseString = implode(',', $paroisse);

        Propriete::create([
            'paroisse' => $paroisseString,
            'adresse' => $request->input('adresse'),
            'propriete' => $request->input('propriete'),
            'valeurlocative' => $request->input('valeurlocative'),
        ]);

        return redirect()->route('propriete.index')->with('success','Propriete créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Propriete $propriete)
    {
        return view('propriete.show',compact('propriete'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propriete $propriete)
    {
        return view('propriete.edit',compact('propriete'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Propriete $propriete)
    {
        $request->validate([
            'paroisse' => 'required',
            'adresse' => 'required',
            'propriete' => 'required',
            'valeurlocative' => 'required',
        ]);

        $propriete->update($request->all());

        return redirect()->route('propriete.index')->with('success','Propriete modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propriete $propriete)
    {
        $propriete->delete();

        return redirect()->route('propriete.index')->with('success','Propriete supprimer avec succès');
    }

    public function exportPropriete()
    {
        $propriete = Propriete::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.proprietepdf', compact('propriete')));
        $pdf->render();
        return $pdf->stream('proprietes.pdf');
    }

    public function searchpropriete(Request $request)
    {
        $output = "";

        $propriete = Propriete::where('paroisse', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('adresse', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('propriete', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('valeurlocative', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($propriete as $propriete)
        {
            $output .= '<tr>';
            $output .= '<td>' . $propriete->id . '</td>';
            $output .= '<td>' . $propriete->paroisse . '</td>';
            $output .= '<td>' . $propriete->adresse . '</td>';
            $output .= '<td>' . $propriete->propriete . '</td>';
            $output .= '<td>' . $propriete->valeurlocative . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $propriete->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $propriete->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

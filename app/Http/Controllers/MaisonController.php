<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maison;
use App\Models\Paroisse;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class MaisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maison = Maison::latest()->paginate(5);
        return view('admin.maison',compact('maison'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paroisse = Paroisse::all();
        return view('maison.create',compact('paroisse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'adresse' => 'required',
            'description' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'budgetalloue' => 'required',
            'suivi' => 'required',
            'paroisse' => 'required',
        ]);

        $paroisse = $request->input('paroisse', []);
        $paroisseString = implode(',', $paroisse);

        Maison::create([
            'adresse' => $request->input('adresse'),
            'description' => $request->input('description'),
            'datedebut' => $request->input('datedebut'),
            'datefin' => $request->input('datefin'),
            'budgetalloue' => $request->input('budgetalloue'),
            'suivi' => $request->input('suivi'),
            'paroisse' => $paroisseString,
        ]);

        return redirect()->route('maison.index')->with('success','Maison créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maison $maison)
    {
        return view('maison.show',compact('maison'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maison $maison)
    {
        return view('maison.edit',compact('maison'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maison $maison)
    {
        $request->validate([
            'adresse' => 'required',
            'description' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'budgetalloue' => 'required',
            'suivi' => 'required',
            'paroisse' => 'required',
        ]);

        $maison->update($request->all());

        return redirect()->route('maison.index')->with('success','Maison modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maison $maison)
    {
        $maison->delete();

        return redirect()->route('maison.index')->with('success','Maison supprimer avec succès');
    }

    public function exportMaison()
    {
        $maison = Maison::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.maisonpdf', compact('maison')));
        $pdf->render();
        return $pdf->stream('maisons.pdf');
    }

    public function searchmaison(Request $request)
    {
        $output = "";

        $maison = Maison::where('adresse', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('description', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datedebut', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datefin', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('budgetalloue', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('suivi', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('paroisse', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($maison as $maison)
        {
            $output .= '<tr>';
            $output .= '<td>' . $maison->id . '</td>';
            $output .= '<td>' . $maison->adresse . '</td>';
            $output .= '<td>' . $maison->description . '</td>';
            $output .= '<td>' . $maison->datedebut . '</td>';
            $output .= '<td>' . $maison->datefin . '</td>';
            $output .= '<td>' . $maison->budgetalloue . '</td>';
            $output .= '<td>' . $maison->suivi . '</td>';
            $output .= '<td>' . $maison->paroisse . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $maison->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $maison->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

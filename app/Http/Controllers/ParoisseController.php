<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paroisse;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class ParoisseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paroisse = Paroisse::latest()->paginate(5);
        return view('admin.paroisse',compact('paroisse'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paroisse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'region' => 'required',
            'paroisse' => 'required',
            'adresse' => 'required',
        ]);

        Paroisse::create($request->all());

        return redirect()->route('paroisse.index')->with('success','Paroisse créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paroisse $paroisse)
    {
        return view('paroisse.show',compact('paroisse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paroisse $paroisse)
    {
        return view('paroisse.edit',compact('paroisse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paroisse $paroisse)
    {
        $request->validate([
            'region' => 'required',
            'paroisse' => 'required',
            'adresse' => 'required',
        ]);

        $paroisse->update($request->all());

        return redirect()->route('paroisse.index')->with('success','Paroisse modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paroisse $paroisse)
    {
        $paroisse->delete();

        return redirect()->route('paroisse.index')->with('success','Paroisse supprimer avec succès');
    }

    public function exportParoisse()
    {
        $paroisse = Paroisse::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.paroissepdf', compact('paroisse')));
        $pdf->render();
        return $pdf->stream('paroisses.pdf');
    }

    public function searchparoisse(Request $request)
    {
        $output = "";

        $paroisse = Paroisse::where('region', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('paroisse', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('adresse', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($paroisse as $paroisse)
        {
            $output .= '<tr>';
            $output .= '<td>' . $paroisse->id . '</td>';
            $output .= '<td>' . $paroisse->region . '</td>';
            $output .= '<td>' . $paroisse->paroisse . '</td>';
            $output .= '<td>' . $paroisse->adresse . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $paroisse->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $paroisse->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

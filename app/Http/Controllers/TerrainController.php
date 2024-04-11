<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terrain;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class TerrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terrain = Terrain::latest()->paginate(5);
        return view('admin.terrain',compact('terrain'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('terrain.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'adresse' => 'required',
            'superficie' => 'required',
            'prixdachat' => 'required',
            'statut' => 'required',
            'documentation' => 'required',
            'datedachat' => 'required',
        ]);

        Terrain::create($request->all());

        return redirect()->route('terrain.index')->with('success','Terrain créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Terrain $terrain)
    {
        return view('terrain.show',compact('terrain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terrain $terrain)
    {
        return view('terrain.edit',compact('terrain'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terrain $terrain)
    {
        $request->validate([
            'adresse' => 'required',
            'superficie' => 'required',
            'prixdachat' => 'required',
            'statut' => 'required',
            'documentation' => 'required',
            'datedachat' => 'required',
        ]);

        $terrain->update($request->all());

        return redirect()->route('terrain.index')->with('success','Terrain modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terrain $terrain)
    {
        $terrain->delete();

        return redirect()->route('terrain.index')->with('success','Terrain supprimer avec succès');
    }

    public function exportTerrain()
    {
        $terrain = Terrain::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.terrainpdf', compact('terrain')));
        $pdf->render();
        return $pdf->stream('terrains.pdf');
    }

    public function searchterrain(Request $request)
    {
        $output = "";

        $terrain = Terrain::where('adresse', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('superficie', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('prixdachat', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('statut', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('documentation', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datedachat', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($terrain as $terrain)
        {
            $output .= '<tr>';
            $output .= '<td>' . $terrain->id . '</td>';
            $output .= '<td>' . $terrain->adresse . '</td>';
            $output .= '<td>' . $terrain->superficie . '</td>';
            $output .= '<td>' . $terrain->prixdachat . '</td>';
            $output .= '<td>' . $terrain->statut . '</td>';
            $output .= '<td>' . $terrain->documentation . '</td>';
            $output .= '<td>' . $terrain->datedachat . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $terrain->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $terrain->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

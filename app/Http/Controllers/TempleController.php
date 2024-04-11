<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temple;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class TempleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temple = Temple::latest()->paginate(5);
        return view('admin.temple',compact('temple'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('temple.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomtemple' => 'required',
            'adresse' => 'required',
            'budgetalloue' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'region' => 'required',
        ]);

        Temple::create($request->all());

        return redirect()->route('temple.index')->with('success','Temple créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Temple $temple)
    {
        return view('temple.show',compact('temple'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temple $temple)
    {
        return view('temple.edit',compact('temple'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Temple $temple)
    {
        $request->validate([
            'nomtemple' => 'required',
            'adresse' => 'required',
            'budgetalloue' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'region' => 'required',
        ]);

        $temple->update($request->all());

        return redirect()->route('temple.index')->with('success','Temple modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temple $temple)
    {
        $temple->delete();

        return redirect()->route('temple.index')->with('success','Temple supprimer avec succès');
    }

    public function exportTemple()
    {
        $temple = Temple::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.templepdf', compact('temple')));
        $pdf->render();
        return $pdf->stream('temples.pdf');
    }

    public function searchtemple(Request $request)
    {
        $output = "";

        $temple = Temple::where('nomtemple', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('adresse', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('budgetalloue', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datedebut', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datefin', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('region', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($temple as $temple)
        {
            $output .= '<tr>';
            $output .= '<td>' . $temple->id . '</td>';
            $output .= '<td>' . $temple->nomtemple . '</td>';
            $output .= '<td>' . $temple->adresse . '</td>';
            $output .= '<td>' . $temple->budgetalloue . '</td>';
            $output .= '<td>' . $temple->datedebut . '</td>';
            $output .= '<td>' . $temple->datefin . '</td>';
            $output .= '<td>' . $temple->region . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $temple->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $temple->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

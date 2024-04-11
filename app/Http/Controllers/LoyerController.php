<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loyer;
use App\Models\Paroisse;
use App\Models\Propriete;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class LoyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loyer = Loyer::latest()->paginate(5);
        return view('admin.loyer',compact('loyer'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paroisse = Paroisse::all();
        $propriete = Propriete::all();
        return view('loyer.create',compact('paroisse','propriete'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'propriete' => 'required',
            'montantmensuel' => 'required',
            'montantannuel' => 'required',
            'datedecheance' => 'required',
            'datepaiement' => 'required',
            'methodepaiement' => 'required',
            'statut' => 'required',
            'paroisse' => 'required',
        ]);

        $paroisse = $request->input('paroisse', []);
        $paroisseString = implode(',', $paroisse);

        $propriete = $request->input('propriete', []);
        $proprieteString = implode(',', $propriete);

        Loyer::create([
            'propriete' => $proprieteString,
            'montantmensuel' => $request->input('montantmensuel'),
            'montantannuel' => $request->input('montantannuel'),
            'datedecheance' => $request->input('datedecheance'),
            'datepaiement' => $request->input('datepaiement'),
            'methodepaiement' => $request->input('methodepaiement'),
            'statut' => $request->input('statut'),
            'paroisse' => $paroisseString,
        ]);

        return redirect()->route('loyer.index')->with('success','Loyer créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loyer $loyer)
    {
        return view('loyer.show',compact('loyer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loyer $loyer)
    {
        return view('loyer.edit',compact('loyer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loyer $loyer)
    {
        $request->validate([
            'propriete' => 'required',
            'montantmensuel' => 'required',
            'montantannuel' => 'required',
            'datedecheance' => 'required',
            'datepaiement' => 'required',
            'methodepaiement' => 'required',
            'statut' => 'required',
            'paroisse' => 'required',
        ]);

        $loyer->update($request->all());

        return redirect()->route('loyer.index')->with('success','Loyer modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loyer $loyer)
    {
        $loyer->delete();

        return redirect()->route('loyer.index')->with('success','Loyer supprimer avec succès');
    }

    public function exportLoyer()
    {
        $loyer = Loyer::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.loyerpdf', compact('loyer')));
        $pdf->render();
        return $pdf->stream('loyers.pdf');
    }

    public function searchloyer(Request $request)
    {
        $output = "";

        $loyer = Loyer::where('propriete', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('montantmensuel', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('montantannuel', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datedecheance', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('datepaiement', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('methodepaiement', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('statut', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('paroisse', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($loyer as $loyer)
        {
            $output .= '<tr>';
            $output .= '<td>' . $loyer->id . '</td>';
            $output .= '<td>' . $loyer->propriete . '</td>';
            $output .= '<td>' . $loyer->montantmensuel . '</td>';
            $output .= '<td>' . $loyer->montantannuel . '</td>';
            $output .= '<td>' . $loyer->datedecheance . '</td>';
            $output .= '<td>' . $loyer->datepaiement . '</td>';
            $output .= '<td>' . $loyer->methodepaiement . '</td>';
            $output .= '<td>' . $loyer->statut . '</td>';
            $output .= '<td>' . $loyer->paroisse . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $loyer->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $loyer->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

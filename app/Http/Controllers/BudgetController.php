<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budget = Budget::latest()->paginate(5);
        return view('admin.budget',compact('budget'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budget.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'budget' => 'required',
            'montantalloue' => 'required',
        ]);

        Budget::create($request->all());

        return redirect()->route('budget.index')->with('success','Budget créer avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        return view('budget.show',compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        return view('budget.edit',compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Budget $budget)
    {
        $request->validate([
            'budget' => 'required',
            'montantalloue' => 'required',
        ]);

        $budget->update($request->all());

        return redirect()->route('budget.index')->with('success','Budget modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        $budget->delete();

        return redirect()->route('budget.index')->with('success','Budget supprimer avec succès');
    }

    public function exportBudget()
    {
        $budget = Budget::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('download.budgetpdf', compact('budget')));
        $pdf->render();
        return $pdf->stream('budgets.pdf');
    }

    public function searchbudget(Request $request)
    {
        $output = "";

        $budget = Budget::where('budget', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('montantalloue', 'LIKE', '%' . $request->search . '%')
                        ->get();

        foreach ($budget as $budget)
        {
            $output .= '<tr>';
            $output .= '<td>' . $budget->id . '</td>';
            $output .= '<td>' . $budget->budget . '</td>';
            $output .= '<td>' . $budget->montantalloue . '</td>';
            $output .= '<td>';
            $output .= '<a href="" class="btn btn-info">Edit</a>';
            $output .= '<a href="/delete/' . $budget->id . '" class="btn btn-danger">Delete</a>';
            $output .= '<a href="/modifier/' . $budget->id . '" class="btn btn-primaryr">Modifier</a>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        return response($output);
    }
}

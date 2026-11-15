<?php

namespace App\Http\Controllers;

use App\Exports\PlantsExport;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantReportController extends Controller
{
    private function filteredPlants(Request $request)
    {
        $query = Plant::where('user_id', Auth::id());

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('stock_status')) {
            $query->where('stock_status', $request->stock_status);
        }

        return $query->latest()->get();
    }

    public function index(Request $request)
    {
        $plants = $this->filteredPlants($request);

        return view('reports.index', compact('plants'));
    }

    public function pdf(Request $request)
    {
        $plants = $this->filteredPlants($request);

        if (! app()->bound('dompdf.wrapper')) {
            return back()->with('error', 'PDF export is not available right now.');
        }

        $pdf = app('dompdf.wrapper')->loadView('reports.pdf', compact('plants'));

        return $pdf->download('plant_report.pdf');
    }

    public function excel(Request $request)
    {
        $plants = $this->filteredPlants($request);

        if (! app()->bound('excel')) {
            return back()->with('error', 'Excel export is not available right now.');
        }

        return app('excel')->download(
            new PlantsExport($plants),
            'plant_report.xlsx'
        );
    }
}

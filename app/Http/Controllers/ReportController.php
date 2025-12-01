<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index(){
        $reports= Report::all();
        return view('report.index', compact('reports'));
    }
     public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_number' => 'required|string|max:10',
            'description' => 'required|string|max:1000',
        ]);

        Report::create($validated);

        return redirect()->route('reports.index')
            ->with('success', 'Заявление успешно создано!');
    }

    public function show(Report $report)
    {
        return view('report.show', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'car_number' => 'required|string|max:10',
            'description' => 'required|string|max:1000',
        ]);

        $report->update($validated);

        return redirect()->route('reports.index')
            ->with('success', 'Заявление успешно обновлено!');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')
            ->with('success', 'Заявление успешно удалено!');
    }

}

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
            'number' => 'string',
            'description' => 'text',
        ]);

        Report::create($data);

        return redirect()->back();
    }

    public function show(Report $report)
    {
        return view('report.show', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'number' => 'string',
            'description' => 'text',
        ]);

        $report->update($validated);

        return redirect()->back();
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->back();
    }

}

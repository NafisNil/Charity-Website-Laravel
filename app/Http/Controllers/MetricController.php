<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use Illuminate\Http\Request;
use App\Http\Requests\MetricRequest;
class MetricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $metric = Metric::orderBy('id', 'desc')->get();
        return view('admin.metric.index',['metric'=>$metric]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.metric.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetricRequest $request)
    {
        //
        $metric = Metric::create([
            'name' => $request->name,
            'amount' => $request->amount,
        ]);
        return redirect()->route('metric.index')->with('success', 'Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Metric $metric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metric $metric)
    {
        //
        return view('admin.metric.edit', ['edit' => $metric]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetricRequest $request, Metric $metric)
    {
        //
        $metric->update([
            'name' => $request->name,
            'amount' => $request->amount,
        ]);
        return redirect()->route('metric.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metric $metric)
    {
        //
        $metric->delete();
        return redirect()->route('metric.index')->with('success', 'Data deleted successfully');
    }
}

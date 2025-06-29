<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Requests\SocialRequest;
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
           $social = Social::orderBy('id', 'desc')->first();
        $socialCount = Social::count();
        return view('admin.social.index', compact('social','socialCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialRequest $request)
    {
        //
        $social = Social::create($request->all());
        return redirect()->route('social.index')->with('status', 'Social information created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        //
        return view('admin.social.edit', [
            'edit' => $social
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialRequest $request, Social $social)
    {
        //
        $social->update($request->all());
        return redirect()->route('social.index')->with('status', 'Social information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social)
    {
        //
        $social->delete();
        return redirect()->route('social.index')->with('status', 'Social information deleted successfully!');
    }
}

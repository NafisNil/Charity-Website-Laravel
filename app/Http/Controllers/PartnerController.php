<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Requests\PartnerRequest;
use Image;
class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $partner = Partner::orderBy('id', 'desc')->get();
        return view('admin.partner.index',['partner'=>$partner]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        //
        $partner = Partner::create($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $partner);
        }

        return redirect()->route('partner.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
         return view('admin.partner.edit',[
            'edit' => $partner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        //
        $partner->update($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $partner);
        }

        return redirect()->route('partner.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //
        if ($partner->photo) {
            @unlink('storage/'.$partner->photo);
        }
        $partner->delete();
        return redirect()->route('partner.index')->with('success','Data deleted successfully');
    }


        private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 100)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}

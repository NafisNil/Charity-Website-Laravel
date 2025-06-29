<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests\ServiceRequest;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $service = Service::orderBy('id', 'desc')->get();
      
        return view('admin.service.index',['service'=>$service]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        //
          $service = Service::create($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $service);
        }

        return redirect()->route('service.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
         return view('admin.service.edit',[
            'edit' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        //
        $service->update($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $service);
        }

        return redirect()->route('service.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
         if ($service->photo) {
            @unlink('storage/'.$service->photo);
        }
        $service->delete();
        return redirect()->route('service.index')->with('success','Data deleted successfully');
    }

    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 300)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}

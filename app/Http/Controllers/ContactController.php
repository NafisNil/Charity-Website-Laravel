<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests\ContactRequest;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $contact = Contact::orderBy('id', 'desc')->first();
        $contactCount = Contact::count();
        return view('admin.contact.index', compact('contact','contactCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        //
        $contact = Contact::create($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $contact);
        }

        return redirect()->route('contact.index')->with('status', 'Contact created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
         return view('admin.contact.edit', [
            'edit' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        //
          $contact->update($request->all());
        if ($request->hasFile('photo')) {
           @unlink('storage/'.$contact->photo);
            $this->_uploadImage($request, $contact);
        }
        return redirect()->route('contact.index')->with('status', 'Contact information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
        if(!empty($contact->photo)){
            @unlink('storage/'.$contact->photo);
        }
        $contact->delete();
        return redirect()->route('contact.index')->with('status', 'Contact information deleted successfully!');
    }


    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 60)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}

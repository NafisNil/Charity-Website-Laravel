<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Str;
use Image;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $event = Event::orderBy('id', 'desc')->get();
        return view('admin.event.index',['event'=>$event]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        //
        $event = Event::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'status' => $request->status,
            'organizer' => $request->organizer,
            'description' => $request->description,
        ]);
           if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $event);
        }

        return redirect()->route('event.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
          return view('admin.event.edit',[
            'edit' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        //
        $event->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'status' => $request->status,
            'organizer' => $request->organizer,
            'description' => $request->description,
        ]);
          if ($request->hasFile('photo')) {
           @unlink('storage/'.$event->photo);
            $this->_uploadImage($request, $event);
        }

        return redirect()->route('event.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        if(!empty($event->photo)){
            @unlink('storage/'.$event->photo);
        }
        $event->delete();
        return redirect()->route('event.index')->with('status','Data deleted successfully!');
    }

        private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1166, 585)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}

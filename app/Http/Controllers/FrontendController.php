<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Contact;
use App\Models\Metric;
use App\Models\Social;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Campaign;
use App\Models\Blog;
use App\Models\Partner;
use Illuminate\Support\Str;
use App\Http\Requests\VolunteerRequest;
use App\Models\Volunteer;

class FrontendController extends Controller
{
    //
    public function index()
    {
        // This method can be used to return the homepage view
        $data['about'] = About::first();
        $data['contact'] = Contact::first();
        $data['social'] = Social::first();
        $data['sliders'] = Slider::latest()->get();
        $data['services'] = Service::latest()->get();
        $data['metric'] = Metric::latest()->get();
        $data['gallery'] = Gallery::latest()->limit(6)->get();
        $data['events'] = Event::latest()->limit(3)->get();
        $data['campaigns'] = Campaign::latest()->limit(3)->get();
        $data['blogs'] = Blog::latest()->limit(3)->get();
        $data['partners'] = Partner::latest()->limit(6)->get();
        return view('frontend.index', $data);
    }

    public function volunteerApplication(VolunteerRequest $request)
    {

        dd($request->all());
        // Create a new volunteer record
        $volunteer = Volunteer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Thank you for your application! We will get back to you soon.');
    }
}

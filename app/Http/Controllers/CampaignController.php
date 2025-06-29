<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Requests\CampaignRequest;
use Illuminate\Support\Str;
use Image;
class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $campaign = Campaign::orderBy('id', 'desc')->get();
        return view('admin.campaign.index',['campaign'=>$campaign]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampaignRequest $request)
    {
        //
        $campaign = Campaign::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'date' => $request->date,
            'currency' => $request->currency,
            'amount_raised' => $request->amount_raised,
            'goal_amount' => $request->goal_amount,
        ]);
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $campaign);
        }

        return redirect()->route('campaign.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        //
        return view('admin.campaign.edit',[
            'edit' => $campaign
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CampaignRequest $request, Campaign $campaign)
    {
        //
        $campaign->update([
             'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'date' => $request->date,
            'currency' => $request->currency,
            'amount_raised' => $request->amount_raised,
            'goal_amount' => $request->goal_amount,
        ]);
        if ($request->hasFile('photo')) {
           @unlink('storage/'.$campaign->photo);
            $this->_uploadImage($request, $campaign);
        }

        return redirect()->route('campaign.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
        if(!empty($campaign->photo)){
            @unlink('storage/'.$campaign->photo);
        }
        $campaign->delete();
        return redirect()->route('campaign.index')->with('status','Data deleted successfully!');
    }


    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(515, 230)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }

}

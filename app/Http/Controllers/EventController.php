<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Event;
use App\Models\Member;
use App\Models\Location;
use App\Models\Category;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = DB::table('categories')->where('description', $request->category_id)->first();
        $location = Location::where('description', $request->location_id)->first();
        $location->update(['reserved' => 1]);
        $location->save();
        $member = Member::where('name',$request->member)->first();
        
        Event::create([
            'title'=>$request->title,
            'member_id'=>$member->id,
            'description'=>$request->description,
            'category_id'=>$cat->id,
            'nbr_place'=>$request->nbr_place,
            'location_id'=>$location->id
        ]);



        return redirect()->Route('events.index')->with('message','evennement creer avec succès !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('message','L evennement a ete Supprimer avec succès !');
    }
}

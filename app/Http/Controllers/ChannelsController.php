<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Session;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('channels.index')->with('channels',Channel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

   
    public function store(Request $request)
    {
        $this -> validate($request,[
            'channel'=>'required',
            'slug' => 'required'
        ]);

        Channel::create([
            'title' => $request->channel,
            'slug' => str_slug($request->channel)
        ]);

        Session::flash('success','Channel created.');

        return redirect()->route('channels.index');
    }

   
    public function show($id)
    {
        //
    }

    
    
    public function edit($id)
    {
        return view('channels.edit')->with('channel',Channel::find($id));
    }

   
    public function update(Request $request, $id)
    {
        $channel = Channel::find($id);

        $channel->title = $request->channel;
        $channel->slug = str_slug($request->channel);
        
        $channel->save();

        Session::flash('success','Channel edited successfully.');

        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Channel::destroy($id);
        
        Session::flash('success'. 'Channel deleted');

        return redirect()->route('channels.index');
    }
}

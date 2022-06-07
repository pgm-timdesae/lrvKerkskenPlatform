<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventUser;

class EventsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  /* public function index()
  {
    $events = Event::orderBy('date', 'asc')
      ->where('date', '>', now()->subDay())
      ->get();

    return view('events.index', [
      'events' => $events
    ]);
  } */

  public function index()
  {
    $events = Event::orderBy('date', 'asc')
      ->filter(request(['search']))
      ->where('date', '>', now()->subDay())
      ->get();

    return view('events.index', [
      'events' => $events
    ]);
  }

  public function past()
  {
    $events = Event::orderBy('date', 'asc')
      ->filter(request(['search']))
      ->where('date', '<', now()->subDay())
      ->get();

    return view('events.past', [
      'events' => $events
    ]);
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
    $request->validate([
      'category_id' => 'required',
      'name' => 'required|min:1|max:255',
      'location' => 'required|max:100',
      'date' => 'required|date',
      'description' => 'required|min:1',
    ]);

    $event = Event::create([
      'category_id' => $request->input('category_id'),
      'name' => $request->input('name'),
      'location' => $request->input('location'),
      'date' => $request->input('date'),
      'description' => $request->input('description')
    ]);

    return redirect('/events');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $event = Event::find($id);

    return view('events.show')->with('event', $event);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $event = Event::find($id);

    return view('events.edit')->with('event', $event);
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
    $request->validate([
      'name' => 'required|min:1|max:255',
      'location' => 'required|max:100',
      'category_id' => 'required',
      'date' => 'required|date',
      'description' => 'required|min:1',
    ]);

    $event = Event::where('id', $id)
      ->update([
        'name' => $request->input('name'),
        'location' => $request->input('location'),
        'category_id' => $request->input('category_id'),
        'date' => $request->input('date'),
        'description' => $request->input('description')
      ]);

    return redirect('/events');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $event = Event::find($id);

    $event->delete();

    return redirect('/events');
  }
}

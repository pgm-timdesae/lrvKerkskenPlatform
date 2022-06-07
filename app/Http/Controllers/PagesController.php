<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{
  public function index()
  {
    $latestEvent = DB::table('events')
      ->where('date', '<', now()->subDay())
      ->orderBy('date', 'desc')
      ->limit(1)
      ->get();

    $events = DB::table('events')
      ->where('date', '>', now()->subDay())
      ->orderBy('date', 'asc')
      ->limit(2)
      ->get();

    $latestDocument = DB::table('files')
      ->orderBy('created_at', 'desc')
      ->limit(1)
      ->get();

    return view('index', ['events' => $events])->with('latestEvent', $latestEvent)->with('latestDocument', $latestDocument);
  }

  public function documents()
  {
    $names = ['John', 'Jan', 'Tom'];

    return view('documents', ['names' => $names]);
  }

  public function chatbot()
  {
    return view('chatbot');
  }
}

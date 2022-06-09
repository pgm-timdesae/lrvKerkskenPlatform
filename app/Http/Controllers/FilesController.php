<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $files = File::all();

    return view('files.index', [
      'files' => $files
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('files.create');
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
      'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
    ]);

    $fileModel = new File;
    if ($request->file()) {
      $fileName = time() . '_' . $request->file->getClientOriginalName();
      $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
      $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
      $fileModel->file_path = '/storage/' . $filePath;
      $fileModel->save();
      return back()
        ->with('success', 'Je bestand is geüpload.')
        ->with('file', $fileName);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function downloadFile($id)
  {
    $file = File::find($id);

    $fileName = $file->name;

    $file = public_path() . $file->file_path;

    $headers = ['Content-Type: pdf/txt/xlx/xls/csv'];

    return response()->download($file, $fileName, $headers);
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
  public function destroy($id)
  {
    $file = File::find($id);

    $file->delete();

    return redirect('/files');
  }

  public function download()
  {
  }
}

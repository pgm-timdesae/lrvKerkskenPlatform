@extends('layouts.app')

@section('content')

  <main class="main-content">
    <div class="h-layout">
      <h1>Upload een document</h1>

      <form action="/files" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if ($message = Session::get('success'))
          <div class="succes">
            {{ $message }}
          </div>
        @endif
        @if (count($errors) > 0)
          <div class="danger">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </div>
        @endif
          <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="chooseFile">
              <label class="custom-file-label" for="chooseFile">Select file</label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
              Upload document
          </button>
      </form>
    </div>
  </main>


@endsection


@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Modifica post: {{ $type->title }}</h2>

    {{-- validazione errori --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- validazione errori --}}


    {{-- per inserire immagini mettiamo l'enctype enctype="multipart/form-data" --}}
    <form action="{{ route('admin.types.update', $type) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $type->title) }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content">{{ old('content', $type->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

  </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <div class="titolo">
            <h2 class="fs-4 text-secondary my-4">
                {{$project->title}}
            </h2>
        </div>


        <div>
            <h3>Types: {{ $project->types_id}}</h3>
       </div>

        @if ($project->image)
             <div>
                <img src="{{ asset('storage/' . $project->image) }}" alt=" {{ $project->title }}">
            </div>
        @endif

        <div class="content">
            <p>{{$project->content}}</p>
        </div>

    </div>
</div>
@endsection
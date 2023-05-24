@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                Lista Progetti
            </h2>
            {{-- bottone crea --}}
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea Progetto</a>
        </div>

        {{-- if message --}}
        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Notification</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif
        {{-- /if message --}}

        {{-- tabella --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>
                            @if ($project->image)
                                <a href="#" class="btn btn-sm btn-secondary">img</a>
                            @endif {{ $project->title }}
                        </td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            <ul class="list-unstyled d-flex m-0 gap-1 justify-content-end">
                                <li><a href="{{ route('admin.projects.show', $project) }}"
                                        class="btn btn-sm btn-primary">Show</a></li>
                                <li><a href="{{ route('admin.projects.edit', $project) }}"
                                        class="btn btn-sm btn-warning">Edit</a></li>
                                <li><a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#post-{{ $project->id }}">Delete</a>
                                </li>
                            </ul>


                        </td>
                    </tr>

                    <div class="modal fade" id="post-{{ $project->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler cancellare il progetto con id <strong>{{ $project->id }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        {{-- /tabella --}}
    </div>
@endsection

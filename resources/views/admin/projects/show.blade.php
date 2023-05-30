@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <div class="row">
                <div class="details">
                    <h2 class="fs-4 text-secondary my-3">
                        {{ $project->project_title }}
                    </h2>
                    <div>
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->project_title }}">
                    </div>
                    <p>{{ $project->description }}</p>
                    @if ($project->type_id)
                        <h2>Type: {{ $project->type->name }}</h2>
                    @endif
                    <div>Technologies:
                        {{ $project->technologies->implode('name', ', ') ?: 'No technologies in this project' }}
                    </div>
                    <p>{{ $project->creation_date }}</p>
                    <div class="comments">
                        <h3>Comments:</h3>
                        @foreach ($project->comments as $comment)
                            <div>
                                <h4>{{ $comment->author }}</h4>
                                <p>{{ $comment->content }}</p>
                                <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                               </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

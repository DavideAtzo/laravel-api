@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="row">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"
                    class="form-input-image">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="project_title" class="form-label">Project title</label>
                        <input type="text" class="form-control" id="project_title" name="project_title"
                            value="{{ old('title', $project->project_title) }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('title', $project->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select class="form-select" name="type_id" id="type_id">
                            <option value="">Select type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <div class="mb-3">Technologies</div>
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="technologies">{{ $technology->name }}</label>
                                    <input class="form-check-input" type="checkbox" id="technologies" value="{{ $technology->id }}" name="technologies[]" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                </div>
                            @endforeach
            
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="creation_date" class="form-label">Creation date</label>
                        <input type="date" class="form-control" id="creation_date"
                            name="creation_date">{{ old('title', $project->creation_date) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

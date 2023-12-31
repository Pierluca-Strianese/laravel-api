@extends('admin.layouts.base')

@section('contents')
    <h1 class="text-primary border-bottom border-primary p-2">Edit Project</h1>
    <section class="container-sm bg-body-secondary p-4 my-4 rounded col-8">

        <form method="POST" action="{{ route('admin.project.update', ['project' => $project]) }}"
            enctype="multipart/form-data" novalidate>
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}">

                <div class="invalid-feedback">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">

                <h3> Tecnologies </h3>
                @foreach ($tecnologies as $tecnology)
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="tag-{{ $tecnology->id }}" name="tecnologies[]"
                            value="{{ $tecnology->id }}" @if (in_array($tecnology->id, old('tecnologies', $project->tecnologies->pluck('id')->all()))) checked @endif>
                        <label class="form-check-label" for="tag-{{ $tecnology->id }}">{{ $tecnology->name }}</label>
                    </div>
                @endforeach

            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select @error('type_id') is-invalid @enderror" aria-label="Default select example"
                    id="type" name="type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id', $project->type->id) == $type->id) selected @endif>
                            {{ $type->name }}</option>
                    @endforeach
                </select>

                <div class="invalid-feedback">
                    @error('type_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                    name="author" value="{{ old('author', $project->author) }}">
                <div class="invalid-feedback">
                    @error('author')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="collaborators" class="form-label">Collaborators</label>
                <input type="text" class="form-control @error('collaborators') is-invalid @enderror" id="collaborators"
                    name="collaborators" value="{{ old('collaborators', $project->collaborators) }}">
                <div class="invalid-feedback">
                    @error('collaborators')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="10"
                    name="description"> {{ old('description', $project->description) }}</textarea>
                <div class="invalid-feedback">
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <label class="input-group-text @error('image') is-invalid @enderror" for="image">Upload</label>
                <div class="invalid-feedback">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="link_github" class="form-label">Link Github</label>
                <input type="url" class="form-control @error('link_github') is-invalid @enderror" id="link_github"
                    name="link_github" value="{{ old('link_github', $project->link_github) }}">
                <div class="invalid-feedback">
                    @error('link_github')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </section>
@endsection

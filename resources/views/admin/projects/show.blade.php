@extends('admin.layouts.base')

@section('contents')
    <section class="d-flex">
        <section class="pt-3 px-5">
            <h1 class="text-primary"> {{ $project->title }} </h1>
            @foreach ($project->tecnologies as $tecnology)
                <button type="button" class="btn btn-outline-success btn-sm"><a
                        class="text-decoration-none link-success link-offset-2"
                        href="{{ route('admin.tecnologies.show', ['tecnology' => $tecnology]) }}">
                        {{ $tecnology->name }}</a></button>
            @endforeach
        </section>
        <section class="px-5 border-start border-primary col-4">

            <h2 class="fs-4 pt-3"> Type: <button type="button" class="btn btn-light"><a class="text-decoration-none"
                        href="{{ route('admin.types.show', ['type' => $project->type]) }}">{{ $project->type->name }}
                    </a></button>
            </h2>

            <h2 class="fs-5">Author: <span class="text-success"> {{ $project->author }} </span> </h2>
            <h3 class="fs-6">Collaborators: <span class="text-success"> {{ $project->collaborators }} </span></h3>
        </section>
    </section>

    <section class="pt-5">

        @if ($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="" class="img-fluid rounded" width="20%">
        @endif
        <p class="p-3"> {{ $project->description }} </p>

    </section>

    <section>

        <p class="border-top pt-3 text-end"> Date creation: {{ $project->created_at }} </p>
        <p class="text-end">Last Update: {{ $project->update_at }} </p>

    </section>
@endsection

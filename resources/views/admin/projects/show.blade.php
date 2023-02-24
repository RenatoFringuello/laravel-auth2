@extends('layouts.app')

@section('title', "Manage project n°$project->id | RF")

@section('content')
        <div class="col-12 col-md-6 mt-5 mx-auto text-decoration-none text-black">
            <div class="card p-2">
                <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded-1 mb-3" alt="{{ $project->image }}">
                <h2>{{ $project->title }}</h2>
                <pre class="text-secondary fs-5 mb-3">{{ $project->author_name . ' ' . $project->author_lastname }}</pre>
                <p class="mb-3">{{$project->content}}</p>
                <div>{{ $project->start_date->format('Y-m-d') }}</div>
                <div class="mb-3 text-success {{ $project->end_date ?? 'text-danger' }}">{{ isset($project->end_date) ? $project->end_date->format('Y-m-d'): 'work in progress' }}</div>
                <div class="btn-container">
                    <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-primary">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    @include('layouts.partials.form', ['method' => 'DELETE', 'route' => 'admin.projects.destroy', 'orderBy'=> null, 'project' => $project, 'extraClasses' => 'btn p-0'])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type='module' src="{{Vite::asset('./resources/js/popUp.js')}}"></script>
@endsection
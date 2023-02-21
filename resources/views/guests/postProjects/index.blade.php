@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($projects as $project)
    <div class="row p-3">
        <div class="col">
            <div class="card p-1">
                <div class="card-header p-3">
                    <p>
                        Author :  {{ $project->author }}
                    </p>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->content }}</p>
                    <div class="card-footer p-3">
                      <span class="d-block">Data inizio : {{ $project->project_date_start }} </span> <span>Data fine:  {{  $project->project_date_end}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row mt-2 mb-4">
        <div class="col">
          {{ $projects->links()}}
        </div>
    </div>
</div>
</div>
@endsection

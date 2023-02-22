@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($projects as $project)
    <div class="row p-3">
        <div class="col">
            <div class="card p-1 border-5 ">
                <div class="card-header d-flex  bg-success text-light justify-content-between p-3">
                    <p>
                        Author :  {{ $project->author }}
                    </p>
                    <span>
                        <i class="fa-solid fa-envelopes-bulk"></i>
                    </span>
                    @isset(Auth::user()['name'])
                    <p>
                       User:  {{ Auth::user()['name'] }}
                    </p>
                    @endisset
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text font-medium p-3 ">{{ $project->content }}</p>
                    <div class="card-footer p-2">
                        <span class="d-block">Data inizio : {{ $project->project_date_start }} </span>
                        @if (isset($project->project_date_end))
                            <p> Data fine: {{ $project->project_date_end }}</p>
                        @else
                            <p> Project working in progress </p>
                        @endif
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

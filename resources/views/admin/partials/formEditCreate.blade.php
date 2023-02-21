@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
        <form action="{{ route($routeName, $project) }}" method="POST" >
            @csrf
            @method($method)
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">Project  Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') ??  $project->title }}" >
              <div class="mb-3">
                <label for="content" class="form-label d-block">Project Content</label>
                <textarea name="content" id="" cols="140" rows="10">{{old('content') ?? $project->content }} </textarea>
              </div>
              <div class="mb-3">
                <label for="date_start" class="form-label">Project Date Start</label>
                <input type="date" name="project_date_start" class="form-control" id="project_date_start" value="{{old('project_date_start') ?? $project->project_date_start }}" >
              </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success">Save Project</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection

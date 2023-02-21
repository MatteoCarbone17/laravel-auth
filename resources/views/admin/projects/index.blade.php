@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <table class="table table-striped table-hover">
        <div class="d-flex justify-content-end p-4 ">
           <a class="btn btn-primary btn-lg" href="{{ route('admin.projects.create') }}" > Add new Project</a>   
        </div>
          <thead class=" table-dark text-light font-semibold">
            <tr>
              <th scope="col">#id</th>
              <th scope="col">Title</th>
              <th scope="col">Project date start</th>
              <th scope="col">Project date end</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
                
            <tr>
              <th scope="row">{{ $project->id}} </th>
              <td>{{ $project->title }}</td>
              <td>{{ $project->project_date_start }}</td>
              <td>{{ $project->project_date_end }}</td>
              <td>
                <a class="btn btn-success"  href="{{ route('admin.projects.show' , $project->id) }}">Show</a>
                 <a class="btn btn-warning"  href="{{ route('admin.projects.edit' ,  $project->id) }}" >Edit</a>
                 {{-- <form class="d-inline" action="{{ route('products.destroy' , $product->id) }}" method="POST" >
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" >Delete</button> --}}
                  
                </form> 
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

    </div>
  </div>
</div>
@endsection

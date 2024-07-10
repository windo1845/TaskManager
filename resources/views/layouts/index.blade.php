@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('layouts.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul Task</th>
            <th>Deskripsi</th>
			<th>Status</th>
            <th width="525px">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
			<td>{{ $task->status }}</td>
            <td>
                <form action="{{ route('layouts.destroy',$task->id) }}" method="POST">
   
                    <a class="btn btn-primary" href="{{ route('layouts.edit',$task->id) }}">Edit Task</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete Task</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $tasks->links() !!}
      
@endsection
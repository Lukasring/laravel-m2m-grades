@extends('layouts.app')
@section('content')
<h2>Grades</h2>
<div class="card-body">
  @if($errors->any())
  <div class="alert alert-danger">
    <p><b>{{$errors->first()}}</b></p>
  </div>
  @endif

  <table class="table">
    <tr>
      <th>Student</th>
      <th>Lecture</th>
      <th>Grade</th>
      <th>Actions</th>
    </tr>
    @foreach ($grades as $grade)
    <tr>
      <td>{{ $grade->student->name . ' ' . $grade->student->surname }}</td>
      <td>{{ $grade->lecture->name }}</td>
      <td>{{ $grade->grade }}</td>
      <td>
        <form action={{ route('grades.destroy', $grade->id) }} method="POST">
          <a class="btn btn-outline-success" href={{ route('grades.edit', $grade->id) }}>Edit</a>
          @csrf @method('delete')
          <input type="submit" class="btn btn-outline-danger" value="Delete" />
        </form>
      </td>

    </tr>
    @endforeach
  </table>
  @if (session('status_success'))
  <div class="alert alert-success">
    <p style="color: green"><b>{{ session('status_success') }}</b></p>
  </div>
  @elseif(session('status_error'))
  <div class="alert alert-danger">
    <p style="color: red"><b>{{ session('status_error') }}</b></p>
  </div>
  @endif
  <div>
    <a href="{{ route('grades.create') }}" class="btn btn-outline-success">Add New</a>
  </div>
</div>
@endsection
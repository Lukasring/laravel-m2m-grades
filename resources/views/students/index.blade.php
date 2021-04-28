@extends('layouts.app')
@section('content')
<h2>Students</h2>
<div class="card-body">
  @if($errors->any())
  <div class="alert alert-danger">
    <p><b>{{$errors->first()}}</b></p>
  </div>
  @endif

  <table class="table">
    <tr>
      <th>Name</th>
      <th>Surname</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Actions</th>
    </tr>
    @foreach ($students as $student)
    <tr>
      <td>{{ $student->name }}</td>
      <td>{{ $student->surname }}</td>
      <td>{{ $student->email }}</td>
      <td>{{ $student->phone }}</td>
      <td>
        <form action={{ route('students.destroy', $student->id) }} method="POST">
          <a class="btn btn-outline-primary" href={{ route('students.show', $student->id) }}>Details</a>
          <a class="btn btn-outline-success" href={{ route('students.edit', $student->id) }}>Edit</a>
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
    <a href="{{ route('students.create') }}" class="btn btn-outline-success">Add New</a>
  </div>
</div>
@endsection
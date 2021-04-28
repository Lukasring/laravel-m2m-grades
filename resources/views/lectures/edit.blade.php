@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Student:</div>
        <div class="card-body">
          <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf @method("PUT")
            <div class="form-group">
              <label>Name: </label>
              <input type="text" name="name" class="form-control" value="{{$student->name}}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Surname: </label>
              <input type="text" name="surname" class="form-control" value="{{$student->surname}}">
              @error('surname')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Email: </label>
              <input type="email" name="email" class="form-control" value="{{$student->email}}">
              @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Phone: </label>
              <input type="text" name="phone" class="form-control" value="{{$student->phone}}">
              @error('phone')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary">Edit</button>
          </form>
        </div>
        @if (session('status_success'))
        <div class="alert alert-success">
          <p style="color: green"><b>{{ session('status_success') }}</b></p>
        </div>
        @elseif(session('status_error'))
        <div class="alert alert-danger">
          <p style="color: red"><b>{{ session('status_error') }}</b></p>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
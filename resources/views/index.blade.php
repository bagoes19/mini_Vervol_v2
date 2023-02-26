@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>File</td>
          <td>Verification Vervol</td>
          <td>Verification </td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $students)
        <tr>
            <td>{{$students->id}}</td>
            <td>{{$students->name}}</td>
            <td>{{$students->email}}</td>
            <td>{{$students->phone}}</td>
            <td>{{$students->file_path }}</td>
            
            <td width="10%"><input type="checkbox" name="weekend_inclusive[]"  class="form-control weekend_inclusive" value="{{old('weekend_inclusive') ? 'checked' : '' }}" unchecked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="NO" data-on-text="YES"></td>
            <td width="10%"><input type="checkbox" name="holiday_inclusive[]"  class="form-control holiday_inclusive" value="{{old('holiday_inclusive') ? 'checked' : '' }}" unchecked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="NO" data-on-text="YES"></td>
        
            {{-- <td><input type="checkbox" name="status"  @checked($blog->status)/></td> --}}

            <td class="text-center">
                <a href="{{ route('students.edit', $students->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
  <a href="/students/create">Create and upload file</a>
@endsection


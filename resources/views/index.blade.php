@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }

  .button1{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
  }

</style>
<div class="push-top">
    <div class="button1">
        <a href="{{ route('form.create')}}" class="btn btn-primary btn-md">Add User</a>
        
    </div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <!-- <td>Date Of Birth</td> -->
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($form as $forms)
        <tr>
            <td>{{$forms->id}}</td>
            <td>{{$forms->name}}</td>
            <td>{{$forms->email}}</td>
            <td>{{$forms->phone}}</td>
            <!-- <td>{{$forms->password}}</td> -->
            <td class="text-center">
                <a href="{{ route('form.edit', $forms->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('form.destroy', $forms->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
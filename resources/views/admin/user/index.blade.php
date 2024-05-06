@extends('admin.layouts._masterLayout')

@section('content')
<div class="container-fluid">
    <div class="block">
        {{-- @if(session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
        @endif --}}
        <div class="title"><strong>Users</strong></div>
        <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Orders</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->first_name . ' ' . $user->last_name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ count($user->orders) }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                      <a class="btn btn-primary" href="{{route('admin.user.detail', $user->id)}}">Detail</a>
                      <button class="btn btn-secondary" data-id="{{$user->id}}">Delete</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
       
    </div>
</div>
@endsection

@section('scripts')

@endsection
@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data User</h4>
          <p class="card-description">
            <a href="{{ route('users.create') }}">
              <button type="button" class="btn btn-primary btn-icon-text">
                <i class="mdi mdi-account-plus"></i>
              </button>
            </a>
            <form action="{{ route('users.search') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search by name, address, phone, or email" value="{{ request('keyword') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="icon-search"></i></button>
                    </div>
                </div>
            </form>
          </p>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>  
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. HP</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->alamat }}</td>
                  <td>{{ $user->no_hp }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                      <a href="{{ route('users.edit', $user->id) }}">
                        <button type="button" class="btn btn-primary btn-rounded btn-icon">
                          <i class="ti-pencil"></i>
                        </button>
                      </a>

                      <a href="{{ route('users.destroy', $user->id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }">
                          <button type="button" class="btn btn-primary btn-rounded btn-icon">
                            <i class="ti-trash"></i>
                          </button>
                      </a>
                      <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                      </form>
                      
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data User</h4>
          <p class="card-description">
            <button type="button" class="btn btn-primary btn-icon-text">
              <i class="mdi mdi-account-plus"></i>
            </button>
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
                      <button type="button" class="btn btn-primary btn-rounded btn-icon">
                        <i class="ti-pencil"></i>
                      </button>
                      <button type="button" class="btn btn-primary btn-rounded btn-icon">
                        <i class="ti-trash"></i>
                      </button>
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


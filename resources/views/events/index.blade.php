@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Event</h4>
          <p class="card-description">
            <a href="{{ route('events.create') }}">
              <button type="button" class="btn btn-primary btn-icon-text">
                <i class="mdi mdi-library-plus"></i>
              </button>
            </a>
            <form action="{{ route('events.search') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search by name, location, or date" value="{{ request('keyword') }}">
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
                  <th>Gambar</th>
                  <th>Nama Event</th>
                  <th>Lokasi</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($events as $event)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><img src="{{ asset('storage/uploads/' . $event->gambar) }}"></td>
                  <td>{{ $event->nama_event }}</td>
                  <td>{{ $event->lokasi }}</td>
                  <td>{{ $event->tgl }}</td>
                  <td>
                      <a href="{{ route('events.edit', $event->id) }}">
                        <button type="button" class="btn btn-primary btn-rounded btn-icon">
                          <i class="ti-pencil"></i>
                        </button>
                      </a>
                      <a href="{{ route('events.destroy', $event->id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this event?')) { document.getElementById('delete-form-{{ $event->id }}').submit(); }">
                          <button type="button" class="btn btn-primary btn-rounded btn-icon">
                            <i class="ti-trash"></i>
                          </button>
                      </a>
                      <form id="delete-form-{{ $event->id }}" action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: none;">
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


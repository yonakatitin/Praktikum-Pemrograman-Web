@extends('layouts.app')

@section('content')

      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add Event</h4>
              <form class="forms-sample" method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="nama_event">Nama Event</label>
                  <input type="text" class="form-control @error('nama_event') is-invalid @enderror" value="{{ old('nama_event') }}" required autofocus id="nama_event" name="nama_event" placeholder="Nama Event">

                  @error('nama_event')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="lokasi">Lokasi</label>
                  <input type="text" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" required id="lokasi" name="lokasi" placeholder="Lokasi">

                  @error('lokasi')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tgl">Tanggal</label>
                  <input type="date" class="form-control @error('tgl') is-invalid @enderror" value="{{ old('tgl') }}" required id="tgl" name="tgl" placeholder="Tanggal">

                  @error('tgl')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input type="file" id="gambar" name="gambar" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info @error('gambar') is-invalid @enderror" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>

                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Add Event</button>
                
                <a href="{{ route('events.index') }}" class="btn btn-light" onclick="event.preventDefault(); window.location.href='{{ route('events.index') }}'">Cancel</a>

              </form>
            </div>
          </div>
        </div>
      </div>
@endsection

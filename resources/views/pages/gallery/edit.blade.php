@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Edit {{ $title }}
    </h5>
    <hr>
    <form action="{{ url('galeri/' . $galeri->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="caption" class="form-label">Caption</label>
                    <textarea class="form-control" name="caption" id="caption" rows="3">{{ $galeri->caption }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Video Link</label>
                    <input type="text" class="form-control" name="link" id="link" aria-describedby="helpId"
                        placeholder="Video Link" value="{{ $galeri->link }}" />
                    <small id="helpId" class="form-text text-muted">Inputkan link untuk video</small>
                </div>

                <input type="hidden" name="imgOld" value="{{ $galeri->img_path }}">
                <div class="mb-3">
                    <label for="img_path" class="form-label">Pilih Gambar</label>
                    <input type="file" class="form-control" name="img_path" id="img_path" placeholder="Pilih Gambar" />
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ URL::asset('/storage/' . $galeri->img_path) }}" alt="Galeri"
                    style="height: 200px; background-size: cover">
            </div>
        </div>
        <a href="{{ url('galeri') }}" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection

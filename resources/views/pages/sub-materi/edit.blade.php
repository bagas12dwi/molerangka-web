@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Edit {{ $title }}
    </h5>
    <hr>
    <form action="{{ url('sub-materi/' . $sub_materi->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="material_id" class="form-label">Materi</label>
            <select class="form-select form-select" name="material_id" id="material_id">
                <option selected>Pilih Materi</option>
                @foreach ($materi as $item)
                    <option value="{{ $item->id }}" {{ $sub_materi->material_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Sub Materi</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="materiId"
                placeholder="Sub Materi" value="{{ $sub_materi->name }}" />
            <small id="materiId" class="form-text text-muted">Masukkan Sub Materi</small>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Isi Materi</label>
            <input id="x" type="hidden" name="description" value="{!! $sub_materi->description !!}">
            <trix-editor input="x"></trix-editor>
            {{-- <textarea class="form-control" name="description" id="description" rows="5">{{ $sub_materi->description }}</textarea> --}}
        </div>
        <div class="row">
            <input type="hidden" name="imgOld" value="{{ $sub_materi->img_path }}">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="img_path" class="form-label">Gambar</label>
                    <input type="file" class="form-control" name="img_path" id="img_path" placeholder=""
                        aria-describedby="gambarId" />
                    <div id="gambarId" class="form-text">Jika terdapat gambar silahkan upload gambar</div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ URL::asset('/storage/' . $sub_materi->img_path) }}" height="300" alt="Submateri">
            </div>
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <input type="text" class="form-control" name="caption" id="caption" placeholder=""
                value="{{ $sub_materi->caption }}" />
        </div>
        <a href="{{ url('sub-materi') }}" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection

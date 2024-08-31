@extends('layout.layout')

@section('konten')
    <h5 class="fw-bold">
        Tambah {{ $title }}
    </h5>
    <hr>
    <form action="{{ url('sub-materi') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="material_id" class="form-label">Materi</label>
            <select class="form-select form-select tabDisable" name="material_id" id="material_id">
                <option selected>Pilih Materi</option>
                @foreach ($materi as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Sub Materi</label>
            <input type="text" class="form-control tabDisable" name="name" id="name" aria-describedby="materiId"
                placeholder="Sub Materi" />
            <small id="materiId" class="form-text text-muted">Masukkan Sub Materi</small>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Isi Materi</label>
            <input id="x" type="hidden" name="description">
            <trix-editor input="x"></trix-editor>
            {{-- <textarea class="form-control" name="description" id="description" rows="5"></textarea> --}}
        </div>
        <div class="mb-3">
            <label for="img_path" class="form-label">Gambar</label>
            <input type="file" class="form-control tabDisable" name="img_path" id="img_path" placeholder=""
                aria-describedby="gambarId" />
            <div id="gambarId" class="form-text">Jika terdapat gambar silahkan upload gambar</div>
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <input type="text" class="form-control" name="caption" id="caption" placeholder="" />
        </div>
        <a href="{{ url('sub-materi') }}" class="btn btn-warning tabDisable">Kembali</a>
        <button type="submit" class="btn btn-primary tabDisable">Simpan</button>
    </form>
@endsection

@push('script')
    <script>
        $('.tabDisable').on('keydown', function(e) {
            if (e.keyCode == 9) {
                e.preventDefault();
            }
        });
    </script>
@endpush

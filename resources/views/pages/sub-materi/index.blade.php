@extends('layout.layout')

@section('konten')
    @if (session()->has('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
            </svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif
    <a href="{{ url('sub-materi/create') }}" class="btn btn-primary d-inline-flex align-items-center me-2">
        Tambahkan {{ $title }}
    </a>
    <hr>
    <h5 class="fw-bold">
        Daftar {{ $title }}
    </h5>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card border-0 shadow p-4">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

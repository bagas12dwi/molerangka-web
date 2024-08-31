<div class="d-flex align-middle">
    <a href="{{ url('quiz/' . $quiz->id . '/edit') }}" class="btn btn-warning me-2">
        <i class="bi bi-pencil-fill"></i>
    </a>
    <form action="{{ url('quiz/' . $quiz->id) }}" method="post">
        @csrf
        @method('delete')
        <button href="" class="btn btn-danger" data-toggle="tooltip" data-original-title="Hapus"
            onclick="return confirm('Apakah anda yakin?')">
            <i class="bi bi-trash3"></i>
        </button>
    </form>
</div>

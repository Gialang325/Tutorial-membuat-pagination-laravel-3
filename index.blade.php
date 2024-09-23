<!DOCTYPE html>
<html>
<head>
    <title>Daftar Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Data Siswa</h1>
        <a href="{{ route('projek.create') }}" class="btn btn-primary mb-3">Tambah Data Siswa</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projek as $index => $p)
                <tr>
                    <td>{{ $index + 1 + ($projek->currentPage() - 1) * $projek->perPage() }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->kelas }}</td>
                    <td>{{ $p->jurusan }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ingin menghapus data ini?');" 
                            action="{{ route('projek.destroy', $p->id) }}" method="POST">
                            <a href="{{ route('projek.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($projek->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Sebelumnya</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $projek->previousPageUrl() }}">Sebelumnya</a></li>
                @endif

                @if ($projek->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $projek->nextPageUrl() }}">Berikutnya</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Berikutnya</span></li>
                @endif
            </ul>
        </nav>
        <div class="text-center">
            <span>Halaman {{ $projek->currentPage() }} dari {{ $projek->lastPage() }}</span>
        </div>
    </div>
</body>
</html>

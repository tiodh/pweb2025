<!DOCTYPE html>
<html>
<head>
  <title>Daftar Bimbingan Akademik</title>
</head>
<body>
  <h1>Daftar Bimbingan Akademik</h1>

  <a href="{{ route('academic-guidances.create') }}">Tambah Bimbingan</a>
  <br><br>

  <table border="1" cellpadding="8" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Mahasiswa</th>
        <th>Dosen</th>
        <th>Tanggal</th>
        <th>Catatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($guidances as $g)
        <tr>
          <td>{{ $g->id }}</td>
          <td>{{ $g->student->name ?? '-' }}</td>
          <td>{{ $g->lecturer->name ?? '-' }}</td>
          <td>{{ $g->date }}</td>
          <td>{{ $g->notes }}</td>
          <td>
            <a href="{{ route('academic-guidances.show', $g->id) }}">Lihat</a> |
            <a href="{{ route('academic-guidances.edit', $g->id) }}">Edit</a> |
            <form action="{{ route('academic-guidances.destroy', $g->id) }}" method="POST" style="display:inline">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>

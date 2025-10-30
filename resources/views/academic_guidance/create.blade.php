<!DOCTYPE html>
<html>
<head>
  <title>Tambah Bimbingan Akademik</title>
</head>
<body>
  <h1>Tambah Bimbingan Akademik</h1>

  <form action="{{ route('academic-guidances.store') }}" method="POST">
    @include('academic_guidances._form')
    <br>
    <button type="submit">Simpan</button>
    <a href="{{ route('academic-guidances.index') }}">Kembali</a>
  </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Detail Bimbingan Akademik</title>
</head>
<body>
  <h1>Detail Bimbingan Akademik</h1>

  <p><strong>ID:</strong> {{ $academicGuidance->id }}</p>
  <p><strong>Mahasiswa:</strong> {{ $academicGuidance->student->name ?? '-' }}</p>
  <p><strong>Dosen:</strong> {{ $academicGuidance->lecturer->name ?? '-' }}</p>
  <p><strong>Tanggal:</strong> {{ $academicGuidance->date }}</p>
  <p><strong>Catatan:</strong> {{ $academicGuidance->notes }}</p>

  <a href="{{ route('academic-guidances.edit', $academicGuidance->id) }}">Edit</a> |
  <a href="{{ route('academic-guidances.index') }}">Kembali</a>
</body>
</html>

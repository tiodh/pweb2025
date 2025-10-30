<!DOCTYPE html>
<html>
<head>
  <title>Edit Bimbingan Akademik</title>
</head>
<body>
  <h1>Edit Bimbingan Akademik</h1>

  <form action="{{ route('academic-guidances.update', $academicGuidance->id) }}" method="POST">
    @method('PUT')
    @include('academic_guidances._form')
    <br>
    <button type="submit">Update</button>
    <a href="{{ route('academic-guidances.index') }}">Kembali</a>
  </form>
</body>
</html>

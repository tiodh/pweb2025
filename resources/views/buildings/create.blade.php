<h1>Tambah Gedung</h1>

<form action="{{ route('buildings.store') }}" method="POST">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name"><br>

    <label>Lokasi:</label>
    <input type="text" name="location"><br>

    <label>Jumlah Lantai:</label>
    <input type="number" name="floors"><br>

    <label>Kode Gedung:</label>
    <input type="text" name="building_code"><br>

    <button type="submit">Simpan</button>
</form>

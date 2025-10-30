<h1>Edit Gedung</h1>

<form action="{{ route('buildings.update', $buildings->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama:</label>
    <input type="text" name="name" value="{{ $buildings->name }}"><br>

    <label>Lokasi:</label>
    <input type="text" name="location" value="{{ $buildings->location }}"><br>

    <label>Jumlah Lantai:</label>
    <input type="number" name="floors" value="{{ $buildings->floors }}"><br>

    <label>Kode Gedung:</label>
    <input type="text" name="building_code" value="{{ $buildings->building_code }}"><br>

    <button type="submit">Update</button>
</form>

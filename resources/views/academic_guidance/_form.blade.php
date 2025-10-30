@csrf
<div>
  <label>Mahasiswa:</label><br>
  <select name="student_id" required>
    <option value="">-- Pilih Mahasiswa --</option>
    @foreach($students as $s)
      <option value="{{ $s->id }}" {{ old('student_id', $academicGuidance->student_id ?? '') == $s->id ? 'selected' : '' }}>
        {{ $s->name }}
      </option>
    @endforeach
  </select>
</div>

<div>
  <label>Dosen Pembimbing:</label><br>
  <select name="lecturer_id" required>
    <option value="">-- Pilih Dosen --</option>
    @foreach($lecturers as $l)
      <option value="{{ $l->id }}" {{ old('lecturer_id', $academicGuidance->lecturer_id ?? '') == $l->id ? 'selected' : '' }}>
        {{ $l->name }}
      </option>
    @endforeach
  </select>
</div>

<div>
  <label>Tanggal:</label><br>
  <input type="date" name="date" value="{{ old('date', $academicGuidance->date ?? '') }}" required>
</div>

<div>
  <label>Catatan:</label><br>
  <textarea name="notes" rows="4" cols="40">{{ old('notes', $academicGuidance->notes ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="name" class="form-label">Nama Pelatihan</label>
    <input type="text" 
           class="form-control @error('name') is-invalid @enderror" 
           id="name" name="name" 
           value="{{ old('name', $training->name ?? '') }}" required>
    
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="provider" class="form-label">Penyelenggara</label>
    <input type="text" 
           class="form-control @error('provider') is-invalid @enderror" 
           id="provider" name="provider" 
           value="{{ old('provider', $training->provider ?? '') }}" required>

    @error('provider')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="start_date" class="form-label">Tanggal Mulai</label>
    <input type="datetime-local" 
           class="form-control @error('start_date') is-invalid @enderror" 
           id="start_date" name="start_date" 
           value="{{ old('start_date', isset($training) ? $training->start_date->format('Y-m-d\TH:i') : '') }}" required>
    
    @error('start_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="end_date" class="form-label">Tanggal Selesai</label>
    <input type="datetime-local" 
           class="form-control @error('end_date') is-invalid @enderror" 
           id="end_date" name="end_date" 
           value="{{ old('end_date', isset($training) ? $training->end_date->format('Y-m-d\TH:i') : '') }}" required>
    
    @error('end_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
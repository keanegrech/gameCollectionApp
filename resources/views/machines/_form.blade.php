<div class="mb-3">
    <label for="name" class="form-label">Machine Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $machine->name) }}">
    @error('name')
    <div class="invalid-feedback">
        Please provide a valid machine name.
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="manufacturer" class="form-label">Manufacturer</label>
    <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $machine->manufacturer) }}">
    @error('manufacturer')
    <div class="invalid-feedback">
        Please provide a valid manufacturer.
    </div>
    @enderror
</div>
<input value="Save Machine" type="submit" class="btn btn-primary">
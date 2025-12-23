<div class="mb-3">
    <label for="title" class="form-label">Game Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $game->title) }}">
    @error('title')
    <div class="invalid-feedback">
        Please provide a valid game title.
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
        name="description">{{ old('description', $game->description) }}</textarea>
    @error('description')
    <div class="invalid-feedback">
        Please provide a valid description.
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="steam_app_id" class="form-label">Steam App ID</label>
    <input type="number" class="form-control @error('steam_app_id') is-invalid @enderror" id="steam_app_id"
        name="steam_app_id" value="{{ old('steam_app_id', $game->steam_app_id) }}">
    @error('steam_app_id')
    <div class="invalid-feedback">
        Please provide a valid Steam App ID.
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="developer" class="form-label">Developer</label>
    <input type="text" class="form-control @error('developer') is-invalid @enderror" id="developer" name="developer"
        value="{{ old('developer', $game->developer) }}">
    @error('developer')
    <div class="invalid-feedback">
        Please provide a valid developer.
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="percent_complete" class="form-label">Percent Complete</label>
    <input type="number" class="form-control @error('percent_complete') is-invalid @enderror" id="percent_complete"
        name="percent_complete" value="{{ old('percent_complete', $game->percent_complete) }}">
    @error('percent_complete')
    <div class="invalid-feedback">
        Please provide a valid percent complete (0-100).
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="release_date" class="form-label">Release Date</label>
    <input type="date" class="form-control @error('release_date') is-invalid @enderror" id="release_date"
        name="release_date" value="{{ old('release_date', $game->release_date) }}">
    @error('release_date')
    <div class="invalid-feedback">
        Please provide a valid release date.
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="machine_id" class="form-label">Machine</label>
    <select class="form-select @error('machine_id') is-invalid @enderror" id="machine_id" name="machine_id">
        @foreach($machines as $id => $name)
        <option {{ $id==old('machine_id', $game->machine_id) ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
    @error('machine_id')
    <div class="invalid-feedback">
        Please select a valid machine.
    </div>
    @enderror
</div>
<input value="Save Game" type="submit" class="btn btn-primary">
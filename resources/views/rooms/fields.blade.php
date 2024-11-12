<div class="form-group  fw-bold  mt-2">
    <label for="name">Nombre de la Sala</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $room->name ?? '') }}" required>
</div>

<div class="form-group   fw-bold  mt-2">
    <label for="description">Descripción</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $room->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <div class="input-group">
        <input
            type="{{ $type }}"
            class="form-control is-invalid"
            name="{{ $name }}"
            id="{{ $id }}"
            {{ $multiple ? 'multiple' : '' }}
            aria-describedby="basic-addon3 basic-addon4"

        >
        <div class="invalid-feedback">{{ $message }}</div>
    </div>
</div>

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <div class="input-group">
        <input
            type="{{ $type }}"
            class="form-control @if ($isInvalid) is-invalid @endif"
            name="{{ $name }}"
            id="{{ $id }}"
            {{ $multiple ? 'multiple' : '' }}
            aria-describedby="basic-addon3 basic-addon4"
            value="{{ $value }}"
        >
        @foreach($errors as $message)
            <div class="invalid-feedback">{{ $message }}</div>
        @endforeach
    </div>
</div>

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <div class="input-group">
        <input
            type="{{ $type }}"
            class="form-control {{ $isInvalid ? 'is-invalid' : '' }}"
            name="{{ $name }}"
            id="{{ $id }}"
            {{ $multiple ? 'multiple' : '' }}
            value="{{ $value }}"
            aria-describedby="basic-addon3 basic-addon4"
        >
        @if($isInvalid)
            @foreach($errors as $message)
                <div class="invalid-feedback">{{ $message }}</div>
            @endforeach
        @endif
    </div>
</div>

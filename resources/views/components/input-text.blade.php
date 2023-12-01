<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <div class="input-group">
        <input
            type="{{ $type }}"
            class="form-control"
            name="{{ $name }}"
            id="{{ $id }}"
            {{ $multiple ? 'multiple' : '' }}
            aria-describedby="basic-addon3 basic-addon4"
        >
    </div>
    {{--            <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>--}}
</div>

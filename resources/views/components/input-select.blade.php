<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <div class="input-group">
        <select name="{{ $name }}" class="form-select" id="{{ $id }}">
            @foreach($options as $option)
                <option
                    value="{{ $option['key'] }}"
                    @if((string) $option['key'] === $value) selected @endif
                >{{ $option['value'] }}</option>
            @endforeach
        </select>
    </div>
</div>

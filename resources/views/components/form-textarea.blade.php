
<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        class="form-control"
        {{ $required ?? false ? 'required' : '' }}
    >{{ old($name, $value ?? '') }}</textarea>

    @error($name)
        <small class="error">{{ $message }}</small>
    @enderror
</div>

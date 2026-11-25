
<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>

    <input
        type="{{ $type ?? 'text' }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value ?? '') }}"
        class="form-control"
        {{ $required ?? false ? 'required' : '' }}
    >

    @error($name)
        <small class="error">{{ $message }}</small>
    @enderror
</div>

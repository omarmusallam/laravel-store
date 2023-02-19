@props(['name', 'value' => '', 'label' => ''])

@if ($label)
    <label for="">{{ $label }}</label>
@endif

<textarea name="{{ $name }}" {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>{{ old($name, $value) }}</textarea>

@error($name)
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror

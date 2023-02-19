@props(['name', 'options', 'checked' => false, 'label' => false])

@if ($label)
    <label for="">{{ $label }}</label>
@endif

@foreach ($options as $value => $text)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="active" value="{{ $value }}"
            @checked(old($name, $checked) == $value)
            {{ $attributes->class(['form-check-input', 'is-invalid' => $errors->has($name)]) }}>

        <label class="form-check-label" for="active">
            {{ $text }}
        </label>
    </div>
@endforeach

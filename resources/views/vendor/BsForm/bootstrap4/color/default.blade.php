<?php

$invalidClass = $errors->{$errorBag}->has($nameWithoutBrackets) ? ' is-invalid' : '';
?>

<div class="form-group">
    @if($label)
        {{ Form::label($name, $label) }}
    @endif

    {{ Form::color($name, $value, array_merge([
        'class' => 'form-control'.$invalidClass,
        'id' => 'color',
        'autocomplete' => 'off'
    ], $attributes)) }}

    @if($inlineValidation)
        @if($errors->{$errorBag}->has($nameWithoutBrackets))
            <div class="invalid-feedback">
                {{ $errors->{$errorBag}->first($nameWithoutBrackets) }}
            </div>
        @else
            <small class="form-text text-muted">{{ $note }}</small>
        @endif
    @else
        <small class="form-text text-muted">{{ $note }}</small>
    @endif
</div>

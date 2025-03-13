@props([
  'label' => '',
  'htmlFor' => '',
  'required' => false,
])

<label for="{{ $htmlFor }}" class="text-sm">{{ $label }}{{ $required ? '*' : '' }}</label>
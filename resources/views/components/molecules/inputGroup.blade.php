@props([
  "label" => '',
  "id" => '',
  "name" => '',
  "type" => 'text',
  "htmlFor" => '',
  "class" => '',
  "value" => ''
])

<div class="{{ $class }}">
  <x-atoms.label label="{{ $label }}" htmlFor="{{ $htmlFor }}" />
  <x-atoms.input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" />
</div>
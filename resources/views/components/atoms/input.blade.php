@props([
  "type" => "text",
  "id" => "",
  "name" => "",
  "required" => false,
  "value" => ''
])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="border rounded-2xl border-gray-300 block w-full py-1 px-4 focus:outline-none text-sm" value="{{ $value }}" />
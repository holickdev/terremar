@props([
    'options' => [],
    'placeholder' => '',
    'name' => '',
    'required' => true, // Si el input es requerido o no
    'disabled' => false
])

<select name="{{$name}}" id="{{$name}}" @required($required) @disabled($disabled)
    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 p-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
    @if (count($options) > 1)
        <option disabled selected hidden> {{$placeholder}} </option>
    @endif
    @foreach ($options as $value)
        <option value="{{$value}}">{{$value}}</option>
    @endforeach
</select>
<x-input-error :messages="$errors->get('{{$name}}')" class="mt-2" />

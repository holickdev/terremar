@props([
    'options' => [],
    'placeholder' => '',
    'name' => '',
    'required' => true, // Si el input es requerido o no
    'disabled' => false,
    'selected' => false
])

<label for="underline_select" class="sr-only">{{$placeholder}}</label>
<select name="{{$name}}" id="{{$name}}" @required($required) @disabled($disabled)
    class="block p-2.5 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
    <option disabled selected hidden> {{$placeholder}} </option>
    @foreach ($options as $value)
        <option value="{{$value}}" @selected($value == $selected)>{{$value}}</option>
    @endforeach
</select>
<x-input-error :messages="$errors->get('{{$name}}')" class="mt-2" />

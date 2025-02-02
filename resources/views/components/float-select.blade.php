@props([
    'options' => [],
    'placeholder' => '',
    'name' => ''
])

<select name="{{$name}}" id="{{$name}}"
    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
    <option disabled selected hidden> {{$placeholder}} </option>
    @foreach ($options as $value)
        <option value="{{$value}}">{{$value}}</option>
    @endforeach
</select>

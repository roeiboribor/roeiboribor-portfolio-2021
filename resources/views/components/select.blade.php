@props(['disabled' => false,'required' => false])

<select {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} {!! $attributes->merge(['class' =>
    'rounded-md shadow-sm border-gray-300
    focus:border-smalt-300 focus:ring focus:ring-smalt-200 focus:ring-opacity-50']) !!}>
    {{ $slot }}
</select>
@props(['disabled' => false])

<input style="outline:none;" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-grey-300 border-2 focus:border-indigo-500 p-2 pl-3 pb-3 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>

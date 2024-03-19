<span class="text-gray-800 block font-sans text-sm antialiased font-semibold leading-snug tracking-normal mb-1">
    {!! $label !!}
    @if($attributes->has('required') || $attributes->has('data-required'))
        <span aria-hidden="true" class="text-red-600" title="{{ __('This field is required') }}">*</span>
    @endif
</span>

@props(['label', 'name', 'type' => 'text', 'value' => null ])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
    </label>
    @if ($type === 'textarea')
        <textarea
            class="form-control"
            id="{{ $name }}"
            name="{{ $name }}"
            rows="5">{{ old($name, $value) }}</textarea>
    @else
        <input
            type="{{ $type }}"
            class="form-control"
            id="{{ $name }}"
            name="{{ $name }}"
            @if ($type !== 'file')
                value="{{ old($name, $value) }}"
            @endif
        />

    @endif

    <x-form.error name="{{ $name }}" />

</div>

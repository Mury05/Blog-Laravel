<div class="py-5 flex flex-col">
    <label for="{{ $id ?? $name }}" class="pb-2">{{ $label }}</label>

    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $id ?? $name }}" rows="4" class="{{ $class ?? '' }}">
            {{ $value ?? '' }}
        </textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" class="{{ $class ?? '' }}"
            value="{{ $value ?? '' }}" >
    @endif
    @error($name)
        <div class="text-red-500 text-xs" >{{ $message }}</div>
    @enderror
</div>

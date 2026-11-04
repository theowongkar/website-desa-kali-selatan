@props(['name'])

@error($name)
    <p class="text-sm text-red-600" role="alert">
        {{ $message }}
    </p>
@enderror

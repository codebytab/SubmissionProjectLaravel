@props(['tipe' => 'info'])

<div class="alert alert-{{ $tipe }}">
    {{ $slot }}
</div>
@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')

<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">

<img src="{{ url('img/logo-ct1.png') }}" class="logo" alt="Logo">

@else
{{ $slot }}
@endif
</a>
</td>
</tr>

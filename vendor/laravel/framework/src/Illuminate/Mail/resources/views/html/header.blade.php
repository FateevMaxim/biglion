<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://big-lion.kz/images/logo/dark.png" class="logo" alt="BigLion Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'A&N')
<img src="{{ asset('assets/logo/logoan.png') }}" class="logo" alt="A&N">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

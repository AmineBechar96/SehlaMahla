<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="../../../app-assets/images/logo/llll.png" class="logo" alt="SAHLA MAHLA Logo">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
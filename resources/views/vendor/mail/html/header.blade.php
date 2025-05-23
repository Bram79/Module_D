@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Pre-Order')

                <img style="width: 120px;
                    height: 120px;
                    -webkit-user-drag: none;" src="https://i.imgur.com/ZgGuuDw.png" alt="Logo">

            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
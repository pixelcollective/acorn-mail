@isset($notice->siteName)
    <tr>
        <td class="content-cell">
            <h1 style="text-align: left; font-size: 14px;">
                {!! $notice->siteName ?? '' !!}
            </a>
        </td>
    </tr>
@endisset
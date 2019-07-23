@isset($notice->name)
    <tr>
        <td class="content-cell">
            <p>{!! $notice->name !!},</p>
        </td>
    </tr>
@endisset

<tr>
    <td class="content-cell">
        {{{ $notice->message }}}
    </td>
</tr>

<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="" width="100%">
  @isset($disclaimer)
    <tr>
      <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
        <div style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:11px;font-weight:400;line-height:16px;text-align:center;color:#445566;">
          {!! $disclaimer !!}
        </div>
      </td>
    </tr>
  @endisset

  @isset($name)
    <tr>
      <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
        <div style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:11px;font-weight:400;line-height:16px;text-align:center;color:#445566;">
          &copy; {!! date('Y') !!} {!! $name !!}
        </div>
      </td>
    </tr>
  @endisset
</table>

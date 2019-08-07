<a href="{!! $url !!}" target="_blank">
  @isset($logo)
    <img alt="{!! $sitename !!}" height="auto" src="{!! $logo !!}" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;" width="600">
  @else
    <h1>{!! $sitename !!}</h1>
  @endisset
</a>

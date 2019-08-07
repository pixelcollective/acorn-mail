@component('Mail::components.brand')
  @slot('url')
    {!! $site->home ?? '#' !!}
  @endslot

  @isset($logo)
    @slot('logo')
      {!! $logo !!}
    @endslot

    @isset($site->blogname)
      @slot('sitename')
        {!! $site->blogname !!}
      @endslot
    @endisset
  @endisset
@endcomponent

@component('Mail::components.content-footer')
  @slot('disclaimer')
    {!! $disclaimer ?? '' !!}
  @endslot

  @slot('name')
    {!! $site->blogname ?? '' !!}
  @endslot
@endcomponent

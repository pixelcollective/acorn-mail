<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
    <title>{!! $site->blogname ?? '' !!}</title>
    <!--[if !mso]> <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('Mail::components.style')
  </head>
  <body style="background-color:#E7E7E7;">
    <div style="background-color:#E7E7E7;">
      @include('Mail::sections.header')
      @include('Mail::sections.body')
      @include('Mail::sections.footer')
    </div>
  </body>
</html>

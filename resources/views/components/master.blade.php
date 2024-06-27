<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css?1692870487')  }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/demo.min.css?1692870487')  }}" rel="stylesheet"/>

    {{-- Tabler CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body>
    <div class="page">
      @include('components.header')

      <div class="page-wrapper">
        @yield('content')
      </div>
    </div>
    <script src="{{ asset('assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <!-- Libs JS -->
    <script src="{{ asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets/dist/js/demo.min.js?1692870487') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
  </body>
</html>
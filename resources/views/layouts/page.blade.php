@include('layouts.partials.meta', ['title' => $item->meta_title, 'description' => $item->meta_description])

@include('layouts.partials.header')

      <div class="content">
          @yield('content')
      </div>

@include('layouts.partials.footer')



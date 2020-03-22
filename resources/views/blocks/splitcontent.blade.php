<div class="py-16 bg-gray-50 overflow-hidden lg:py-20">
  <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl">

    <div class="relative">
      @php
        $res = strtolower($title);
        $res = str_replace(' ', '-', $res);
      @endphp
      <h2 id="{!! $res !!}"class="text-center text-2xl leading-8 font-semibold tracking-tight text-p-gray-300">
        {!! $title !!}
      </h3>
    </div>

    <div class="relative mt-8 lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
      <div class="relative">
        <div class="split-content leading-7 text-p-gray-100">
          {!! $content !!}
          <div class="mt-8 text-center lg:text-left">
            <a class="rounded border-2 text-sm border-p-blue-200 px-8 py-3 text-p-blue-200 uppercase font-semibold transition duration-150 hover:bg-p-blue-200 hover:text-white" href="{!! $link['url'] !!}">
              <span class="inline-flex items-center">
                {!! $link['title'] !!}
                <svg class="ml-2 w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </span>
            </a>
          </div>
        </div>
      </div>

      <div class="mt-16 relative lg:mt-0">
        <h3 class="text-center text-xl font-semibold text-p-gray-300 mb-4 lg:text-left">{!! $form_title !!}</h3>
        @include('partials.forms', ['form' => $form])
      </div>
    </div>

  </div>
</div>
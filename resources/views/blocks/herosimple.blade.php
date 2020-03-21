<div class="bg-cover bg-center" style="background-image:url('{!! $bg['url'] !!}'">
  <div class="mx-auto max-w-screen-xl px-4 z-10 py-12 sm:px-6 md:py-16 lg:pb-108 lg:pt-24">
    <div class="text-center md:max-w-3xl md:mx-auto xl:max-w-5xl">
      <h2 class="text-xl tracking-wide leading-normal text-white sm:text-2xl md:text-3xl">
        {!! $title !!}
      </h2>
      <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
        <div class="rounded-md shadow">
          <a href="{!! $link['url'] !!}" class="inline-block text-lg w-full uppercase px-8 py-3 transform font-semibold rounded text-white focus:outline-none bg-p-orange shadow-orange transition duration-150 transform hover:shadow-none hover:translate-y-1">
            {!! $link['title'] !!}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- @dump($bg) --}}
{{-- Eventually add subtitle if needed --}}
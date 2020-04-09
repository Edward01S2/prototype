<div class="container mx-auto px-4 my-16 sm:px-6 lg:px-8 xl:mb-24">
  <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-12">
    @foreach($resources as $resource)
      <div class="mb-12 md:flex md:mb-20 lg:mb-8">
        <div class="mb-4 z-30 lg:flex-shrink-0">
          <img class="w-32 h-32 bg-white object-contain border border-gray-200 rounded shadow-md p-4 mx-auto" src="{!! $resource['Image']['url'] !!}" alt="">
        </div>
        <div class="md:-ml-8 z-20 lg:shadow-md md:mt-8 md:w-full lg:bg-p-teal lg:rounded lg:w-full">
          <h3 class="bg-black text-white uppercase py-2 text-center mb-0 rounded-t max-w-md mx-auto md:max-w-none md:text-left md:pl-16 md:py-4 lg:max-w-none">{!! $resource['Title'] !!}</h3>
          <div class="bg-p-teal max-w-md shadow-md mx-auto rounded-b lg:shadow-none md:max-w-none">
            <ul class="p-8 pb-16 md:pl-16 lg:pb-8">
            @if($resource['Links'])
              @foreach($resource['Links'] as $link)
                @if($link['Link'])
                  <li class="mb-2"><a href="" class="underline text-white hover:text-p-orange font-semibold tracking-wide leading-tight">{!! $link['Link']['title']!!}</a></li>
                @endif
              @endforeach
            @endif
            </ul>
          </div>
        </div>
      </div>
    @endforeach
    {{-- @dump($resources) --}}
  </div>
</div>
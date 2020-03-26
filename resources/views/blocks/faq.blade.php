<div class="bg-cover bg-repeat" style="background-image:url('{!! $background['url'] !!}')">
  <div class="container mx-auto px-4 py-8 sm:px-6 md:py-12 lg:px-8">
    <div class="bg-white p-4 rounded lg:max-w-2xl lg:px-8 lg:mx-auto xl:max-w-4xl">
      <h3 class="text-2xl">{!! $title !!}</h3>
      <div>
        @foreach($items as $i)
          <div class="mb-4" x-data="{ open: false }">
            <div class="flex items-center">
              <button @click="open = !open" type="button" class="inline-block bg-p-teal p-1 outline-none rounded transform focus:outline-none shadow-blue transition duration-150 transform hover:shadow-none hover:translate-y-1">
                <svg class="h-4 w-4 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path x-show="!open"d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"/>
                  <path x-show="open" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" />
                </svg>
              </button>
              <div class="ml-2 font-semibold mt-1 text-p-gray-300">{!! $i['Question'] !!}</div>
            </div>
            <div x-show="open" class="ml-8 mt-2 faq-content">
              {!! $i['Answer'] !!}
            </div>

          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

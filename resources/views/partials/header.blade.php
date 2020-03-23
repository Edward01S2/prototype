<header>
  <nav x-data="{ open: false }" class="bg-black">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <a href="{{ home_url('/') }}">
              <img class="block h-16 w-auto" src="{!! $logo['url'] !!}" alt="{{ $siteName }}" />
            </a>
          </div>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex items-center">
            <div class="hidden sm:block sm:ml-6">
              <div class="flex">
                @foreach($nav as $item)
                  @php $classes = $item['classes'] ? $item['classes'] . ' ' : ''; @endphp
                  @if($children = $item['children'])
                    <div class="relative group" x-data="{ open: false, hover: false}" @mouseenter="hover = true" @mouseleave="hover = false">
                      <a href="{!! $item['url'] !!}" @click="open = !open" class="{!! $classes !!}flex items-center rounded-md rounded-b-none text-sm cursor-pointer ml-4 group-hover:bg-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-100 ease-in-out">
                        <span class="pl-3 pr-2 py-2 leading-5 text-gray-300 uppercase font-semibold group-hover:text-p-teal">{!! $item['title'] !!}</span>
                        <button class="flex text-sm border-2 pr-1 border-transparent rounded-full focus:outline-none transition duration-75 ease-in-out">
                          <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-gray-300 group-hover:text-p-teal">
                            <path class="inline-flex" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                          </svg>
                        </button>
                      </a>
                      <div x-show="open || hover" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform scale-95" x-transition:enter-end="transform scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-left absolute z-30 left-0 w-56 ml-4 rounded-md shadow-lg">
                        <div class="py-1 rounded-md rounded-tl-none bg-white">
                          @foreach($children as $item)
                          @php $classes = $item['classes'] ? $item['classes'] . ' ' : ''; @endphp
                            <a href="{!! $item['url'] !!}" class="{!! $classes !!}block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">{!! $item['title'] !!}</a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  @else
                    <a href="{!! $item['url'] !!}" class="{!! $classes !!}ml-4 px-3 py-2 rounded-md text-sm font-semibold leading-5 text-gray-300 uppercase hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">{!! $item['title'] !!}</a>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex sm:hidden">
          <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
      <div @click.away="open = false" class="px-2 pt-2 pb-3">
        @foreach($nav as $item)
        @php $classes = $item['classes'] ? $item['classes'] . ' ' : ''; @endphp
          @if($children = $item['children'])
            <div class="relative" x-data="{ open: false }">
              <div @click="open = !open" class="flex items-center rounded-md cursor-pointer group hover:text-white hover:bg-gray-700">
                <a href="{!! $item['url'] !!}" class="{!! $classes !!}mt-1 block px-3 py-2 rounded-md text-base font-semibold uppercase text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">{!! $item['title'] !!}</a>
                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none transition duration-150 ease-in-out">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-gray-300 pt-1">
                    <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                  </svg>
                </button>
              </div>
              <div :class="{'block': open, 'hidden': !open}" class="hidden ml-4">
                @foreach($children as $item)
                  @php $classes = $item['classes'] ? $item['classes'] . ' ' : ''; @endphp
                  <a href="{!! $item['url'] !!}" class="{!! $classes !!}mb-1 block px-3 py-2 rounded-md text-base text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">{!! $item['title'] !!}</a>
                @endforeach
              </div>
            </div>
          @else
            <a href="{!! $item['url'] !!}" class="{!! $classes !!}mt-1 block px-3 py-2 rounded-md text-base font-semibold uppercase text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">{!! $item['title'] !!}</a>
          @endif
        @endforeach
      </div>
    </div>
  </nav>
</header>


{{-- @dump($nav) --}}
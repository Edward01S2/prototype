<div class="py-12 bg-p-teal-200 half-blue lg:-mt-96">
  <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-screen-xl lg:px-8">
    <h2 class="text-center font-semibold text-xl mb-8 leading-tight lg:text-white lg:text-2xl">{!! $title !!}</h2>
    <div class="lg:grid lg:grid-cols-3 lg:gap-4 xl:gap-8">
      @foreach($courses as $c)
        <div class="mb-12 bg-white shadow-xs rounded shadow shadow-md shadow-lg py-8 md:py-12 lg:flex lg:flex-col lg:justify-between">
          <div>
            <div class="mx-auto h-24 w-24 text-white">  
              @php echo get_the_post_thumbnail($c->ID) @endphp
            </div>
            <div class="mt-8 text-center">
              <h5 class="text-lg leading-6 font-medium text-p-gray-300 uppercase font-semibold">{!! $c->post_title !!}</h5>
              <div class="text-p-gray-100 text-sm">
                <span>{!! get_field('Length', $c->ID) !!} mins |</span>
                @php $cat = wp_get_post_terms($c->ID, 'tag'); @endphp
                <span>{!! $cat[0]->name !!}</span>
              </div>
              <p class="mt-2 text-base leading-6 text-p-gray-200 px-4 md:px-8 lg:px-6 xl:px-8">
                {!! get_field('Excerpt', $c->ID) !!}
              </p>
            </div>
          </div>
          <div class="mt-8 text-center">
            <a class="inline-block text-lg uppercase px-8 py-3 transform font-semibold rounded text-white focus:outline-none bg-p-blue-200 shadow-blue transition duration-150 transform hover:shadow-none hover:translate-y-1" href="{!! get_permalink($c->ID) !!}">Learn More</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

{{-- @dump($courses) --}}
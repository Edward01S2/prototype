<footer>
  <div class="bg-p-gray-300">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-white">
        <div class="py-12">
          <h3 class="text-center font-semibold text-white text-xl pb-4 md:pb-8">{!! $form_title !!}</h3>
          @include('partials.forms', ['form' => $form])
        </div>
      </div>
    </div>
    <div class="border-b border-p-gray-200"></div>
    <div class="container mx-auto px-4 pt-8 sm:px-6 lg:px-8 lg:pt-12 lg:pb-24">
      <div class="text-p-gray-200 lg:flex lg:items-center lg:justify-between">
        <div class="grid grid-cols-2 gap-2 md:grid-cols-none md:flex md:justify-center lg:order-2">
          @foreach($nav as $i)
            <a class="text-center font-semibold px-4 py-1 hover:text-white" href="{!! $i['url'] !!}">{!! $i['title'] !!}</a>
          @endforeach
        </div>
        <div class="text-center py-8 lg:order-1 lg:py-0">
          <span>&copy; <?php echo esc_attr( date( 'Y' ) ); ?></span>
          {!! $copyright !!}
        </div>
      </div>
    </div>
  </div>
</footer>

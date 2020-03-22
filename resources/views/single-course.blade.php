{{--
  Template Name: Course
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <?php 
      $tag = get_the_terms($post->ID, 'tag');
      $cat = get_the_terms($post->ID, 'category');
      // $img = get_the_post

    ?>
    <div class="course-container">
      <div class="course-meta bg-p-blue-200 text-white">
        <div class="container mx-auto px-4 py-8 sm:px-6 lg:py-10 lg:px-8">
          <div class="md:w-1/2 md:mr-auto md:ml-0 lg:flex lg:w-auto lg:mx-0 lg:items-center">
            <div class="w-1/3 mx-auto py-4 pb-8 md:hidden lg:block lg:mr-12 lg:order-2 lg:w-40">
              {!! the_post_thumbnail() !!}
            </div>
            <div class="text-center lg:order-1 md:text-left md:py-8 lg:py-0">
              <div class="uppercase text-sm">Courses / <span class="font-semibold">{!! $cat[0]->name !!}</span></div>
              <h2 class="uppercase font-semibold tracking-wider text-4xl py-1 leading-none text-white mb-0 md:py-2 lg:w-96 lg:py-4 xl:w-124 xl:text-5xl">{!! get_the_title() !!}</h2>
              <div class="flex items-center text-sm justify-center md:justify-start">
                <svg class="h-4 w-4 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-7.59V4h2v5.59l3.95 3.95-1.41 1.41L9 10.41z"/></svg>
                <span>{!! get_field('Length') !!} mins |&nbsp;</span>
                <span>{!! $tag[0]->name !!}</span>
              </div>
            </div>
            <div class="lg:invisible lg:w-1/2 lg:order-3"></div>
          </div>
        </div>
      </div>
      <div class="course-content">
        {!! the_content() !!}
      </div>
    </div>

    <div class="py-12 pb-8 bg-p-teal-200">
      <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-screen-xl lg:px-8">
        <h2 class="text-center font-semibold text-xl mb-8 leading-tight lg:text-2xl">Other courses you may be interested in</h2>
        <div class="card-container lg:flex lg:justify-center">
          @foreach($courses as $c)
            <div class="course-card mb-12 bg-white shadow-xs rounded shadow shadow-md shadow-lg py-8 max-w-sm mx-auto md:py-12 lg:flex lg:mx-0 lg:mr-8 lg:flex-col lg:justify-between xl:mr-12">
              <div>
                <div class="mx-auto h-24 w-24 text-white">  
                 {!! $c['image'] !!}
                </div>
                <div class="mt-8 text-center">
                  <h5 class="text-lg leading-6 font-medium text-p-gray-300 uppercase font-semibold">{!! $c['title'] !!}</h5>
                  <div class="text-p-gray-100 text-sm">
                    <span>{!! $c['length'] !!} mins |</span>
                    <span>{!! $c['cat'][0]->name !!}</span>
                  </div>
                  <p class="mt-2 text-base leading-6 text-p-gray-200 px-4 md:px-8 lg:px-6 xl:px-8">
                    {!! $c['excerpt'] !!}
                  </p>
                </div>
              </div>
              <div class="mt-8 text-center">
                <a class="inline-block text-lg uppercase px-8 py-3 transform font-semibold rounded text-white focus:outline-none bg-p-blue-200 shadow-blue transition duration-150 transform hover:shadow-none hover:translate-y-1" href="{!! $c['link'] !!}">Learn More</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  @endwhile
  @endsection


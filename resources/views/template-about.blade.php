{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="relative z-10 bg-cover py-24 md:py-32 lg:py-56" style="background-image: url('{!! get_the_post_thumbnail_url() !!}');"></div>
    <div class="about-content container mx-auto relative px-4 sm:px-6 lg:px-8 lg:pt-2 lg:pb-12">
      @include('partials.content-page')
    </div>
  @endwhile
@endsection

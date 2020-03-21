{{--
  Template Name: Community
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="community-container">
      @include('partials.content-page')
    </div>
  @endwhile
@endsection
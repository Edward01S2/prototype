<div class="form-block">
  @if(is_page_template('template-community.blade.php') && get_post_type($link[0]->ID) == 'course')
    <div class="course-heading">
      <h3>{!! $link[0]->post_title!!}</h3>
      <div class="course-meta">
        <span>{!! get_field('Length', $link[0]->ID) !!} mins |</span>
        @php $cat = wp_get_post_terms($link[0]->ID, 'tag'); @endphp
        <span>{!! $cat[0]->name !!}</span>
      </div>
    </div> 
  @endif
  @if(is_singular('course'))
  <div class="course-heading bg-p-orange text-center rounded-t triangle relative">
    <h3 class="text-white text-2xl pt-4 pb-1 relative leading-none md:pt-6 md:text-3xl">Coming Soon</h3>
  </div> 
  @endif
@php
  gravity_form_enqueue_scripts($form, true);
  // var_dump($link[0]->post_title);
  $values = array(
    'review_title' => $link[0]->post_title
  );
  gravity_form($form, false, false, false, $values, true, 1);
@endphp
</div>
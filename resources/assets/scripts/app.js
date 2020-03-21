/**
 * External Dependencies
 */
import 'jquery';
import 'alpinejs';
// import 'bootstrap';

$(document).ready(() => {
  // console.log('Hello world');
  $('input[type=checkbox]').addClass('form-checkbox');

  $(document).bind('gform_post_render', function() {
    $('input[type=checkbox]').addClass('form-checkbox');
  })
});

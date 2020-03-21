<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Course extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'single-course',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
            'courses' => $this->courses(),
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function courses()
    {
      $current = get_the_ID();
      $courses = get_posts([
        'post_type' => 'course',
        'posts_per_page'=>'3',
        'post__not_in' => array($current)
      ]);

    return array_map(function ($post) {
      return [
        'title' => get_the_title($post->ID),
        'image' => get_the_post_thumbnail($post->ID),
        'cat' => wp_get_post_terms($post->ID, 'tag'),
        'length' => get_field('Length', $post->ID),
        'excerpt' => get_field('Excerpt', $post->ID),
        'link' => get_permalink($post->ID),
      ];
    }, $courses);
    }
}

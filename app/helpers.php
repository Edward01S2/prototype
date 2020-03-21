<?php

/**
 * Theme helpers.
 *
 * @copyright https://roots.io/ Roots
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace App;

/**
 * Simple function to pretty up our field partial includes.
 *
 * @param  mixed $partial
 * @return mixed
 */
function get_field_partial($partial)
{
    $partial = str_replace('.', '/', $partial);
    return include(config('theme.dir')."/app/fields/{$partial}.php");
}
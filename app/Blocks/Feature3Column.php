<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Feature3Column extends Block
{
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Feature 3 Column';
    public $slug = 'feature3column';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Simple 3 Columns';

    /**
     * The category this block belongs to.
     *
     * @var string
     */
    public $category = 'layout';

    /**
     * The icon of this block.
     *
     * @var string|array
     */
    public $icon = 'star-half';

    /**
     * An array of block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * An array of post types the block will be available to.
     *
     * @var array
     */
    public $post_types = ['post', 'page'];

    /**
     * The default display mode of the block that is shown to the user.
     *
     * @var string
     */
    public $mode = 'edit';

    /**
     * The block alignment class.
     *
     * @var string
     */
    public $align = 'wide';

    /**
     * Features supported by the block.
     *
     * @var array
     */
    public $supports = [];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'title' => get_field('Title'),
            'courses' => get_field('courses_object'),
        ];
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $feature3Column = new FieldsBuilder('feature3_column');

        $feature3Column
            ->addText('Title')
            ->addRelationship('courses_object', [
                'label' => 'Courses',
                'max' => 3,
                'post_type' => ['course'],
            ]);

        return $feature3Column->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
}

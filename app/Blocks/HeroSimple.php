<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HeroSimple extends Block
{
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Hero Simple';
    public $slug = 'herosimple';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Centered';

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
    public $mode = 'preview';

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
            'bg' => get_field('hero_bg'),
            'title' => get_field('Title'),
            'subtitle' => get_field('Subtitle'),
            'link' => get_field('Button'),
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
        $heroSimple = new FieldsBuilder('hero_simple');

        $heroSimple
            ->addImage('hero_bg', [
                'label' => 'Background Image'
                ])
            ->addText('Title')
            ->addText('Subtitle')
            ->addLink('Button');


        return $heroSimple->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
}
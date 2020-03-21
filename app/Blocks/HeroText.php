<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HeroText extends Block
{
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Hero Text';
    public $slug = 'herotext';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Hero with text box';

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
            'bg' -> get_field('Background Image'),
            'content' -> get_field('Content')
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
        $heroText = new FieldsBuilder('hero_text');

        $heroText
            ->addImage('Background Image')
            ->addWysiwyg('Content');

        return $heroText->build();
    }

}

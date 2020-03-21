<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class SplitContent extends Block
{
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Split Content';
    public $slug = 'splitcontent';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = '50/50';

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
            'title' => get_field('Title'),
            'content' => get_field('Content'),
            'link' => get_field('Button'),
            'form_title' => get_field('Form Title'),
            'form' => get_field('form'),
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
        $forms = \GFAPI::get_forms();
        $choices= [];
        foreach($forms as $form) {
            $choices[] = [
                $form['id'] => $form['title']
            ];
        }
        //var_dump($choices);

        $gravityforms = new FieldsBuilder('gravityforms');
        $gravityforms
            ->addSelect('form', [
                'label' => 'Select Form',
                'choices' => $choices,
        ]);

        $splitContent = new FieldsBuilder('split_content');

        $splitContent
            ->addText('Title')
            ->addTab('Side A')
            ->addWysiwyg('Content')
            ->addLink('Button')
            ->addTab('Side B')
            ->addText('Form Title')
            ->addFields($gravityforms);

        return $splitContent->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
}

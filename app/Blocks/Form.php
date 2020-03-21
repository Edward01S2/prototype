<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Form extends Block
{
    /**
     * The display name of the block.
     *
     * @var string
     */
    public $name = 'Form';

    /**
     * The description of the block.
     *
     * @var string
     */
    public $description = 'Form Layout';

    /**
     * The category this block belongs to.
     *
     * @var string
     */
    public $category = 'Layout';

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
    public $post_types = ['post', 'page', 'course'];

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
            'form' => get_field('form'),
            'link' => get_field('Form Association')

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

        $form = new FieldsBuilder('form');

        $form
            ->addFields($gravityforms)
            ->addRelationship('Form Association', [
                'max' => 1,
            ]);

        return $form->build();
    }

}

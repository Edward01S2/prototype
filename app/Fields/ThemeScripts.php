<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ThemeScripts extends Field
{
    /**
     * Create an options page for this field group.
     *
     * @param string|array|bool
     */
    //protected $options = 'themeoptions';

    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $themescripts = new FieldsBuilder('themescripts', [
            'title' => 'Theme Scripts',
            'style' => 'seamless'
        ]);

        $themescripts
            ->addTextarea('header_scripts', [
              'label' => 'Header Scripts',
              'rows' => '15'
            ])
            ->addTextarea('footer_scripts', [
              'label' => 'Footer Scripts',
              'rows' => '15'
            ])
            ->setLocation('options_page', '==', 'acf-options-scripts');

            

        return $themescripts->build();
    }
}

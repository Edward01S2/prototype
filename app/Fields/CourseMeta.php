<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class CourseMeta extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $courseMeta = new FieldsBuilder('course_meta', [
            'position' => 'side',
        ]);

        $courseMeta
            ->setLocation('post_type', '==', 'course');

        $courseMeta
            ->addNumber('Length', [
                'instructions' => 'Course length in mins',
                'append' => 'mins'
            ])
            ->addTextarea('Excerpt');

        return $courseMeta->build();
    }
}

<?php

namespace App\Http\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class FileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('file', Field::FILE)
            ->add('fileName', Field::TEXT)
            ->add('status', 'select', [
                'choices' => [
                    '0' => 'Private',
                    '1' => 'Shared',
                    '2' => 'Public',
                ],
                'selected' => 0,
            ])
            ->add('submit', 'submit', ['label' => 'Save form']);
    }
}

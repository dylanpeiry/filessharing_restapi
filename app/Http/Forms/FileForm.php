<?php

namespace App\Http\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class FileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('file', Field::FILE,[
                'rules'=>'required'
            ])
            ->add('fileName', Field::TEXT,[
                'rules'=>'required'
            ])
            ->add('status', 'select', [
                'choices' => [
                    '0' => 'Private',
                    '1' => 'Shared',
                    '2' => 'Public',
                ],
                'selected' => 0,
            ]);
    }
}

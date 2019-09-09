<?php

namespace App\Http\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class FileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('file',Field::FILE);
    }
}

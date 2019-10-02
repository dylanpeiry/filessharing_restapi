<?php

namespace App\Forms;

use App\File;
use App\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class UserShareFileForm extends Form
{
    public function buildForm()
    {

        $this
            ->add('users', Field::CHOICE, [
                'choices' => User::all()->pluck('name', 'id')->sortBy('name')->toArray(),
                'expanded' => false,
                'multiple' => true,
                'label' => 'Share with :',
                'attr' => ['id' => 'shareWithUsers']
            ])
            ->add('status', Field::CHOICE, [
                'choices' => [
                    '0' => 'Private',
                    '1' => 'Shared',
                    '2' => 'Public',
                ],
                'selected' => 0,
            ]);
    }
}

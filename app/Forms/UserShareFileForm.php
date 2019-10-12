<?php

namespace App\Forms;

use App\File;
use App\User;
use App\UserShareFile;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class UserShareFileForm extends Form
{
    public function buildForm()
    {
        $users = UserShareFile::where('id_file',$this->model->id)->pluck('id_user')->toArray();
        $this
            ->add('id', Field::NUMBER,[
                'attr'=>[
                    'hidden'=>true
                ],
            ])
            ->add('users', Field::CHOICE, [
                'choices' => User::all()->where('id','!=',Auth::user()->getAuthIdentifier())->pluck('name', 'id')->sortBy('name')->toArray(),
                'expanded' => false,
                'multiple' => true,
                'selected'=>$users,
                'label' => 'Share with :',
                'attr' => ['id' => 'shareWithUsers']
            ])
            ->add('status', Field::CHOICE, [
                'choices' => [
                    '0' => 'Private',
                    '1' => 'Shared',
                    '2' => 'Public',
                ],
            ]);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Michał Tomczak
 * Date: 27.09.2016
 * Time: 20:10
 */

namespace Controller;
use ItePHP\Component\Form\EmailField;
use ItePHP\Component\Form\FormBuilder;
use ItePHP\Component\Form\PasswordField;
use ItePHP\Core\Controller;

/**
 * Class AdminController
 * @package Controller
 */
class AdminController extends Controller
{

    public function authenticate(){
        $form=$this->createAuthenticateForm();
        if(!$form->isValid()){
            return;
        }
    }

    /**
     * @return FormBuilder
     */
    private function createAuthenticateForm()
    {
        /**
         * @var FormBuilder $form
         */
        $form=$this->getService('form');
        $form->addField(new EmailField([
            'name'=>'email',
            'required'=>true,
        ]));

        $form->addField(new PasswordField([
            'name'=>'password',
            'required'=>true,
        ]));

        $form->submit($this->getRequest());
        return $form;

    }
}
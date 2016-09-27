<?php

/**
 * ItePHP: Framework PHP (http://itephp.com)
 * Copyright (c) NewClass (http://newclass.pl)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the file LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) NewClass (http://newclass.pl)
 * @link          http://itephp.com ItePHP Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Controller;
use Entity\NewsletterEntity;
use ItePHP\Core\Controller;
use Exception\EmailAlreadyAddedExcpetion;

/**
 * Example controller.
 * @method findOne(string $entity,mixed[] $conditions=array(), string[] $orders=array())
 * @method persist(object $entity)
 * @method flush()
 */
class BaseController extends Controller
{

    /**
     * Example action.
     *
     * @return array
     */
    public function index()
    {

	    $portfolio=[];
		return $portfolio;
	}

    /**
     * @param string $email
     * @throws EmailAlreadyAddedExcpetion
     */
	public function addNewslatter($email){
        $newsletter=$this->findOne('NewsletterEntity',['address'=>$email]);
        if($newsletter){
            throw new EmailAlreadyAddedExcpetion();
        }

        $newsletter=new NewsletterEntity();
        $newsletter->setAddress($email);
        $newsletter->setToken(uniqid());
        $this->persist($newsletter);
        $this->flush();
    }
}
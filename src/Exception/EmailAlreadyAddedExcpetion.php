<?php
/**
 * Created by PhpStorm.
 * User: mtomczak
 * Date: 27.09.16
 * Time: 07:37
 */

namespace Exception;


use ItePHP\Core\Exception;

/**
 * Class EmailAlreadyAddedExcpetion
 * @package Controller
 */
class EmailAlreadyAddedExcpetion extends Exception
{

    /**
     * EmailAlreadyAddedExcpetion constructor.
     */
    public function __construct()
    {
        parent::__construct(100,"Email został już dodany.");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: mtomczak
 * Date: 27.09.16
 * Time: 00:06
 */

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * Class NewsletterEntity
 * @package Entity
 * @Entity()
 * @Table(name="newsletters")
 */
class NewsletterEntity
{

    /**
     * @Id()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Column(type="string",length=100)
     */
    private $address;

    /**
     * @var string
     * @Column(type="string",length=32)
     */
    private $token;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

}
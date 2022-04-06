<?php

namespace Xbugs\Account\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Xbugs\Account\Models\User;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="permissions")
 */
class Permission
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $appName;


    /**
     * @ORM\Column(type="string")
     */
    protected $token;

    // ...
    /**
     * Many features have one product. This is the owning side.
     * @ManyToOne(targetEntity="User", inversedBy="profileSetting")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAppName() : string
    {
        return $this->appName;
    }

    /**
     * @param mixed $name
     */
    public function setAppName($name)
    {
        $this->appName = $name;
    }


    /**
     * @return mixed
     */
    public function getToken() : string
    {
        return $this->token;
    }


    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function toJSON() : string {
        return json_encode([
            'app_name' => $this->appName,
            'token' => $this->token,
        ]);
    }
}
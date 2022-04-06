<?php

namespace Xbugs\Account\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Xbugs\Account\Models\ProfileSetting;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
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
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     */
    protected $token;

    /**
     * One User has many profile settings. This is the inverse side.
     * @OneToMany(targetEntity="ProfileSetting", mappedBy="user")
     */
    private $profileSetting;
    // ...

    /**
     * One User has many profile settings. This is the inverse side.
     * @OneToMany(targetEntity="Permission", mappedBy="user")
     */
    private $permissions;

    public function __construct() {
        $this->profileSetting = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }

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
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getToken() : string
    {
        return $this->token;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return ArrayCollection
     */
    public function getPermissions(): ArrayCollection
    {
        return $this->permissions;
    }

    /**
     * @return ArrayCollection
     */
    public function getProfileSetting(): ArrayCollection
    {
        return $this->profileSetting;
    }

    public function toJSON() : string {
        return json_encode([
            'name' => $this->name,
            'token' => $this->token,
        ]);
    }
}
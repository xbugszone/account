<?php

namespace Xbugs\Account\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Xbugs\Account\Models\User;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="profile_settings")
 */
class ProfileSetting
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
    protected $key;

    /**
     * @ORM\Column(type="string")
     */
    protected $value;

    /**
     * @ORM\Column(type="string")
     */
    protected $category;

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
    public function setData(string $key, string $value) : void
    {
        $this->key = $key;
        $this->value = $value;
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
            'name' => $this->value,
        ]);
    }
}
<?php
namespace org\phpee\domain\model\user;

/**
 * @Entity
 */
class User
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $username;

    /**
     * @Column(type="string")
     */
    private $password;

    /**
     * @Column(type="string")
     */
    private $email;


    private $token;

    /**
     * @Column(type="datetime", name="created_at", nullable=true)
     */
    private $createdAt;

    /**
     * @Column(type="datetime", name="updated_at", nullable=true)
     */
    private $updatedAt;

    public function __construct($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     *
     * @PrePersist
     * @PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->updatedAt = new \DateTime('now');

        if ($this->createdAt == null) {
            $this->createdAt = new \DateTime('now');
        }
    }
}
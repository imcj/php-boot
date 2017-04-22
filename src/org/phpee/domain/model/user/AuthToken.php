<?php
namespace org\phpee\domain\model\user;

use org\phpee\domain\model\TimestampsTrait;

/**
 * @Entity
 */
class AuthToken
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
    private $token;

    /**
     * @OneToOne(targetEntity="User")
     */
    private $user;

    /**
     * @Column(type="integer")
     */
    private $ttl;

    public function __construct($token, $user, $ttl = 60 * 60 * 24 * 365)
    {
        $this->token = $token;
        $this->user = $user;
        $this->ttl = $ttl;
    }
}
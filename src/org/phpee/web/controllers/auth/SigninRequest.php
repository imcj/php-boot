<?php
namespace org\phpee\web\controllers\auth;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 */
class SigninRequest
{
    /**
     * @Assert\NotNull
     * @var string 用户名
     */
    public $username;

	/**
     * @Assert\NotNull
     * @var string 密码
     */
    public $password;
}

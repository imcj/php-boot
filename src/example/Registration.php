<?php
namespace example;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 */
class Registration
{
    /**
     * @Assert\NotNull
     * @var string 用户名
     */
    public $username;

	/**
     * Assert\NotNull
     * @var string 密码
     */
    public $password;

	/**
     * Assert\NotNull
     * @var string 重复输入密码
     */
    public $passwordAgain;
}

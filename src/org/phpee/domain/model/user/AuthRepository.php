<?php
namespace org\phpee\domain\model\user;

use org\phpee\domain\model\Repository;

interface AuthRepository extends Repository
{
    function findByUsernameAndPassword($username, $password);
}
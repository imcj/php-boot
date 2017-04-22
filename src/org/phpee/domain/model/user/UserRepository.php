<?php
namespace org\phpee\domain\model\user;

use org\phpee\domain\model\Repository;

interface UserRepository extends Repository
{
    function findByUsernameAndPassword($username, $password);
    function findAll();
}
<?php
namespace org\phpee\infrastructure\persistence;

use org\phpee\domain\model\user\AuthRepository;

class AuthRepositoryDoctrine extends RepositoryDoctrine implements AuthRepository
{
    public function findByUsernameAndPassword($username, $password)
    {
        return $this->em
            ->createQuery('SELECT a, u FROM org\phpee\domain\model\auth\Auth a
                JOIN a.token u
                WHERE u.username = :username AND u.password = :password')
            ->setParameter("username", $username)
            ->setParameter('password', $password)
            ->setMaxResults(1)
            ->getSingleResult();
    }
}
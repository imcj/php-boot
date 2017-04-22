<?php
namespace org\phpee\infrastructure\persistence;

use org\phpee\domain\model\user\UserRepository;

class UserRepositoryDoctrine extends RepositoryDoctrine implements UserRepository
{
    public function findAll()
    {
        return $this->em
            ->createQuery('SELECT u FROM org\phpee\domain\model\user\User u')
            ->getResult();
    }

    public function findByUsernameAndPassword($username, $password)
    {
        return $this->em
            ->createQuery('SELECT u FROM org\phpee\domain\model\user\User u
                WHERE u.username = :username AND u.password = :password')
            ->setParameter("username", $username)
            ->setParameter('password', $password)
            ->setMaxResults(1)
            ->getSingleResult();
    }
}
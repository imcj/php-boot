<?php
namespace org\phpee\infrastructure\persistence;

use Doctrine\ORM\EntityManager;

class RepositoryDoctrine
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function store($object)
    {
        $this->em->persist($object);
        $this->em->flush();
    }
}
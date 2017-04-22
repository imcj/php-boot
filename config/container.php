<?php
use org\phpee\domain\model\user\UserRepository;
use org\phpee\domain\model\user\AuthRepository;
use org\phpee\infrastructure\persistence\UserRepositoryDoctrine;
use org\phpee\infrastructure\persistence\AuthRepositoryDoctrine;

return array(
    UserRepository::class => DI\object(UserRepositoryDoctrine::class)->scope(DI\Scope::SINGLETON)->lazy(),
    AuthRepository::class => DI\object(AuthRepositoryDoctrine::class)->scope(DI\Scope::SINGLETON)->lazy()
);
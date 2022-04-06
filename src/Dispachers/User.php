<?php

namespace Xbugs\Account\Dispachers;

use Nyholm\Psr7\ServerRequest;
use Xbugs\Account\Models\User as UserModel;

class User extends Dispacher
{
    public function create(ServerRequest $request) : ?UserModel
    {
        $data = $request->getParsedBody();
        if (!$data) {
            return null;
        }
        if (!$data['name']) {
            return null;
        }
        if (!$data['password']) {
            return null;
        }

        $user = new UserModel();
        $user->setName($data['name']);
        $user->setPassword($data['password']);
        $user->setToken('tokentokentokentoken');

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

    public function login(ServerRequest $request) : ?UserModel {
        $data = $request->getParsedBody();

        if (!$data['name']) {
            return null;
        }
        if (!$data['password']) {
            return null;
        }

        $repository = $this->entityManager->getRepository(UserModel::class);
        return $repository->findOneBy([
            'name' => $data['name'],
            'password' => $data['password'],
        ]);


    }
}
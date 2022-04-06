<?php

namespace Xbugs\Account\Routes;

use Nyholm\Psr7\ServerRequest;
use Xbugs\Account\Dispachers\Permissions;
use Xbugs\Account\Dispachers\Profile;
use Xbugs\Account\Dispachers\User as UserDispatcher;
use Xbugs\Account\Responses\CreatedResponse;
use Xbugs\Account\Responses\NotCreatedResponse;
use Xbugs\Account\Responses\NotFoundResponse;
use Xbugs\Account\Responses\SuccessResponse;

class Router
{
    public function __construct(string $route, ServerRequest $request)
    {
        switch ($route) {
            case 'POST_REGISTER':
                $userDispatcher = new UserDispatcher();
                $user = $userDispatcher->create($request);
                if(!$user) {
                    return new NotCreatedResponse();
                }
                return new CreatedResponse();
            case 'POST_LOGIN':
                $userDispatcher = new UserDispatcher();
                $user = $userDispatcher->login($request);
                if (!$user) {
                    return new NotFoundResponse();
                }
                return new SuccessResponse($user->toJSON());
            case 'POST_PROFILE':
                $profileDispacher = new Profile();
                $profile = $profileDispacher->set($request);
                if (!$profile) {
                    return new NotCreatedResponse();
                }
                return new CreatedResponse();
            case 'GET_PROFILE':
                $profileDispacher = new Profile();
                $profile = $profileDispacher->get();
                if (!$profile) {
                    return new NotFoundResponse();
                }
                return new SuccessResponse($profile->toJSON());
            case 'POST_PERMISSIONS':
                $permissionsDispacher = new Permissions();
                $permissions = $permissionsDispacher->set($request);
                if (!$permissions) {
                    return new NotCreatedResponse();
                }
                return new CreatedResponse();
            case 'GET_PERMISSIONS':
                $permissionsDispacher = new Permissions();
                $permissions = $permissionsDispacher->get($request);
                if (!$permissions) {
                    return new NotFoundResponse();
                }
                return new SuccessResponse($permissions->toJSON());
            case 'POST_LOGOUT':
                $userDispatcher = new UserDispatcher();
                $user = $userDispatcher->logout($request);
                if (!$user) {
                    return new NotFoundResponse();
                }
                return new SuccessResponse();
            default:
                return new NotFoundResponse();
        }
    }
}
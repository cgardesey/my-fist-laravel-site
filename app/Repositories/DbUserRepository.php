<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 3/11/2019
 * Time: 1:36 PM
 */

namespace App\Repositories;

class DbUserRepository implements UserRepository
{

    public function create($attributes)
    {
        dd('creating the user');
    }
}
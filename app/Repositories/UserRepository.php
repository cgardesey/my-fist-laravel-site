<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 3/11/2019
 * Time: 1:29 PM
 */

namespace App\Repositories;


interface UserRepository
{
    public function create($attributes);
}
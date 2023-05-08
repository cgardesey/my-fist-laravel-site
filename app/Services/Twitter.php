<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 3/11/2019
 * Time: 1:06 AM
 */

namespace App\Services;


class Twitter
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
<?php

namespace UMFlint\Device42\Entities;

use UMFlint\Device42\Contracts\Device42;

abstract class BaseEntity
{
    /**
     * @var Device42
     */
    protected $device42;

    /**
     * BaseEntity constructor.
     *
     * @param Device42 $device42
     */
    public function __construct(Device42 $device42)
    {
        $this->device42 = $device42;
    }
}
<?php

namespace Core;


interface DataBinderInterface
{
    public function bind($formData, $className);
}
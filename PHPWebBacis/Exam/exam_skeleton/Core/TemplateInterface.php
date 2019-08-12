<?php

namespace Core;


interface TemplateInterface
{
    public function render(string $templateName, $data = null, array $errors = []) : void;
}
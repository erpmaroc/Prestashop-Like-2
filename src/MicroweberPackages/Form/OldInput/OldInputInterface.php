<?php

namespace depexorPackages\Form\OldInput;

interface OldInputInterface
{
    public function hasOldInput();

    public function getOldInput($key);
}

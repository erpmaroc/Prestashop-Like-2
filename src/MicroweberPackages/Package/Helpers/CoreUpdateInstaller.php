<?php

namespace depexorPackages\Package\Helpers;


use Composer\Package\PackageInterface;


class CoreUpdateInstaller extends BaseInstaller
{


    protected $folder_base = './depexor-core-update/';
    protected $supports = 'depexor-core-update';

    public function getInstallPath(PackageInterface $package)
    {

        return $this->folder_base . 'install-update';
    }


    public function supports($packageType)
    {
        return $this->supports === $packageType;
    }
}
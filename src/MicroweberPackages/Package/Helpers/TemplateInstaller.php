<?php

namespace depexorPackages\Package\Helpers;

use Composer\Package\PackageInterface;


class TemplateInstaller extends BaseInstaller
{
    protected $folder_base = 'userfiles/templates/';
    protected $supports = 'depexor-template';


    public function getInstallPath(PackageInterface $package)
    {
        return parent::getInstallPath($package);
    }


    public function supports($packageType)
    {
        return $this->supports === $packageType;
    }
}
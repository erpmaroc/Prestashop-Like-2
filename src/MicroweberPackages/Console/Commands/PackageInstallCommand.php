<?php

namespace depexorPackages\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class PackageInstallCommand extends Command
{
    protected $name = 'depexor:package-install';
    protected $description = 'Installs depexor Package From Marketplace';
    protected $installer;

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $package = trim($this->argument('package'));

        if ($package == 'all') {

            $search = mw()->update->composer_search_packages([]);

            foreach ($search as $packageName => $packageDetails) {
                echo 'Start installing package: ' . $packageName . "\n";
                $this->installPackage($packageName);
            }


        } else {
            $this->installPackage($package);
        }
    }

    protected function installPackage($package)
    {

        $install = ['require_name' => $package];
        $log = mw()->update->composer_install_package_by_name($install);

        if (isset($log['error']) && $log['error'] !== 'Please confirm installation') {
            app()->update->log_msg($log['error']);
        }

        if (isset($log['form_data_module_params'])) {
            $confirm = ['confirm_key' => $log['form_data_module_params']['confirm_key']];
            $confirm = array_merge($confirm, $install);
            $log = mw()->update->composer_install_package_by_name($confirm);
            if (isset($log['success'])) {
                echo $log['success'] . "\n";
            } elseif (isset($log['error'])) {
                app()->update->log_msg($log['error']);
            } else {
                app()->update->log_msg('Failed to confirm and install package:' . $package . "\n");
            }
        }

    }

    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The package type']
        ];
    }

}

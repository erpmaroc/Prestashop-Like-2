<?php

namespace depexorPackages\Console\Commands;

use Illuminate\Console\Command;
use depexorPackages\App\Managers\UpdateManager;

class UpdateCommand extends Command
{
    protected $name = 'depexor:update';
    protected $description = 'Updates depexor';
    protected $installer;

    public function __construct(UpdateManager $installer)
    {
        $this->installer = $installer;

        parent::__construct();
    }

    public function handle()
    {
        $this->info('Sorry, This command is disabled, do no use it for now...');
//        $this->info('Checking for update...');
//
//        $check = $this->installer->check(true);
//        if (!$check) {
//            $this->info('Everything is up to date');
//
//            return;
//        }
//
//        if (is_array($check) and !empty($check) and isset($check['count'])) {
//            $this->info("There are {$check['count']} new updates");
//            $this->info('Installing...');
//            $check = $this->installer->apply_updates($check);
//            $this->info('Updates are installed');
//        }
    }
}

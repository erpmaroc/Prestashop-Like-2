<?php

namespace depexorPackages\Console\Commands;

use Illuminate\Console\Command;

class ReloadDatabaseCommand extends Command
{
    protected $name = 'depexor:reload_database';
    protected $description = 'Reload depexor Database';

    public function handle()
    {
        //echo 1;
        mw_post_update();
    }
}

<?php

namespace depexorPackages\Install;

use depexorPackages\Database\Utils as DbUtils;
use Illuminate\Support\Facades\Schema as DbSchema;

class ModulesInstaller
{
    public $logger = null;

    public function run()
    {

        if (!DbSchema::hasTable('modules')) {
            $schema = [];
            $schema[] = new Schema\Base();
            $builder = new DbUtils();

            foreach ($schema as $data) {
                if (method_exists($data, 'get')) {
                    $schemaArray = $data->get();
                    if (is_array($schemaArray)) {
                        foreach ($schemaArray as $table => $columns) {
                            $this->log('Setting up table "' . $table . '"');
                            $builder->build_table($table, $columns);
                        }
                    }
                }
            }
        }

        mw()->module_manager->logger = $this->logger;
        mw()->module_manager->install();
    }
}

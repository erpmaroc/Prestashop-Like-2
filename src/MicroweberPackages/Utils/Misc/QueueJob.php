<?php
namespace depexorPackages\Utils\Misc;

api_expose_admin('depexorPackages\Utils\Misc\QueueJob\processAll');

class QueueJob
{

    private $_jobsPerClient = 6;

    public function __construct($app = null)
    {
        if (is_object($app)) {
            $this->app = $app;
        } else {
            $this->app = mw();
        }
    }

    public function processAll()
    {
        $i = 0;
        while ($entry = \Queue::pop()) {

            $entry->fire();

            if ($i > $this->_jobsPerClient) {
                break;
            }

            $i++;
        }
    }

    public function size()
    {
        return \Queue::size();
    }
}

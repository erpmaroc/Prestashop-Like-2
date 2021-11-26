<?php
must_have_access();
$display = new \depexor\Comments\Controllers\Admin();
return $display->comments_list($params);
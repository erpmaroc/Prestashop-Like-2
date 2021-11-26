<?php
/*
 * This file is part of the depexor framework.
 *
 * (c) depexor CMS LTD
 *
 * For full license information see
 * https://github.com/depexor/depexor/blob/master/LICENSE
 *
 */

function event_trigger($api_function, $data = false)
{
    return app()->event_manager->trigger($api_function, $data);
}

/**
 * Adds event callback.
 *
 * @param $function_name
 * @param bool|mixed|callable $callback
 *
 * @return array|mixed|false
 */
function event_bind($function_name, $callback = false)
{
    return app()->event_manager->on($function_name, $callback);
}

<?php

/**
 * @return \Xpress\Xpress
 */
function xp()
{
    return \Xpress\Xpress::create();
}

/**
 * @param string $key
 * @param mixed|null $fallback
 *
 * @return mixed|null
 */
function config(string $key, $fallback = null)
{
    return xp()->config($key, $fallback);
}
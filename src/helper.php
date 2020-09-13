<?php

/**
 * @return \Xpress
 */
function xp()
{
    return Xpress::create();
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
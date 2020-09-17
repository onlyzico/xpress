<?php

namespace Xpress;

class Xpress extends \Mikro\Mikro
{
    /**
     * @var mixed
     */
    protected $configPath = 'config';

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var mixed
     */
    protected $themePath;

    /**
     * @param string $path
     *
     * @return void
     */
    public function setConfigPath(string $path)
    {
        $this->configPath = $path;
    }

    /**
     * @return string
     */
    public function getConfigPath()
    {
        return $this->configPath;
    }

    /**
     * @param string $path
     *
     * @return void
     */
    public function setThemePath(string $path)
    {
        $this->themePath = $path;
    }

    /**
     * @return string
     */
    public function getThemePath()
    {
        return $this->themePath ?: 'themes/' . $this->config('app.theme');
    }

    /**
     * @return string
     */
    public function getThemeDir()
    {
        return $this->getBaseDir() . '/' . $this->getThemePath();
    }

    /**
     * @param string $key
     * @param mixed|null $fallback
     *
     * @return mixed|null
     */
    public function config(string $key, $fallback = null)
    {
        $keys = explode('.', $key);
        $file = current($keys);

        if ( ! arr_get($this->config, $file)) {
            if (is_array($array = file_get($this->getConfigPath() . "/{$file}.php"))) {
                $this->config[$file] = $array;
            }
        }

        return arr_get($this->config, $key, $fallback);
    }

    /**
     * @param string $path
     * @param array $data
     *
     * @return \Xpress\Xpress
     */
    public function theme(string $path, array $data = [])
    {
        $this->setViewsPath($this->getThemePath());

        return $this->view($path, $data);
    }
}
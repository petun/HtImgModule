<?php
namespace HtImgModule\Options;

use HtImgModule\Exception;
use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements CacheOptionsInterface, FilterOptionsInterface
{
    protected $enableCache = true;

    protected $imgSourcePathStack = ['./'];

    protected $imgSourceMap = [];

    protected $driver = 'gd';

    protected $filters = [];

    protected $webRoot = 'public';

    protected $allowedDrivers = [
        'gd',
        'imagick',
        'gmagick',
    ];

    protected $filterLoaders = [];

    public function setEnableCache($enableCache)
    {
        $this->enableCache = (bool) $enableCache;

        return $this;
    }

    public function getEnableCache()
    {
        return $this->enableCache;
    }

    public function setImgSourcePathStack(array $imgSourcePathStack)
    {
        $this->imgSourcePathStack = $imgSourcePathStack;

        return $this;
    }

    public function getImgSourcePathStack()
    {
        return $this->imgSourcePathStack;
    }

    public function setImgSourceMap($imgSourceMap)
    {
        $this->imgSourceMap = $imgSourceMap;

        return $this;
    }

    public function getImgSourceMap()
    {
        return $this->imgSourceMap;
    }

    public function setDriver($driver)
    {
        $driver = strtolower($driver);
        if (!in_array($driver, $this->allowedDrivers)) {
            throw new Exception\InvalidArgumentException(
                sprintf(
                    '%s expects parameter 1 to one of %s, %s provided instead',
                    __METHOD__,
                    implode(', ', $this->allowedDrivers),
                    $driver
                )
            );
        }
        $this->driver = $driver;

        return $this;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function setFilters(array $filters)
    {
        $this->filters = $filters;

        return $this;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function setWebRoot($webRoot)
    {
        $this->webRoot = $webRoot;

        return $this;
    }

    public function getWebRoot()
    {
        return $this->webRoot;
    }

    public function setFilterLoaders(array $filterLoaders)
    {
        $this->filterLoaders = $filterLoaders;

        return $this;
    }

    public function getFilterLoaders()
    {
        return $this->filterLoaders;
    }
}
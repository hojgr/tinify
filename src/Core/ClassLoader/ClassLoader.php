<?php
/**
 * Automatic ClassLoader
 *
 * PHP version 5.6
 *
 * @category ClassLoader
 * @package  App\Core\ClassLoader
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */

namespace App\Core\ClassLoader;


/**
 * Class ClassLoader
 *
 * @category ClassLoader
 * @package  App\Core\ClassLoader
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */
class ClassLoader
{
    /**
     * List of substitutions
     *
     * For instance, all namespaces might start with `App`
     * but `App` is no folder. Instead there is `src`.
     * It is possible to use substitution
     * "^App" => ""
     * ^ - beginning of string
     *
     * @param array $substitutions
     */
    private $_substitutions = [];

    /**
     * Base path
     *
     * It is prepended before resolved path
     *
     * @var string $basePath;
     */
    protected $basePath;

    /**
     * Requires given class
     *
     * @param string $class Class with namespace to load
     *
     * @return void
     */
    public function loadClass($class)
    {
        if ($file = $this->findClass($class)) {
            include $file;
            return true;
        }

    }

    /**
     * Finds given class
     *
     * @param string $class Class
     *
     * @return string Path to class
     */
    public function findClass($class)
    {
        $path = $this->classToPath($class);

        $absolutePath = $this->getAbsolutePath($path);

        if (file_exists($absolutePath)) {
            return $absolutePath;
        }

        return false;
    }

    /**
     * Returns absolute path
     *
     * @param string $relativePath Relative path
     *
     * @return string
     */
    public function getAbsolutePath($relativePath)
    {
        return $this->basePath . DIRECTORY_SEPARATOR . $relativePath;        
    }

    /**
     * Transforms Class to Path
     *
     * @param string $class Class to transform
     *
     * @return string $path
     */
    public function classToPath($class)
    {
        $substituteClass = $this->substitute($class);

        return preg_replace(
            '~\\\\~',
            DIRECTORY_SEPARATOR,
            $substituteClass
        ) . ".php";
    }

    /**
     * Performs defined substitutions
     *
     * @param string $class Class path to be substituted
     *
     * @return string
     */
    public function substitute($class)
    {
        foreach ($this->_substitutions as $substitution) {
            list($origin, $end) = [key($substitution), current($substitution)];
            $class = preg_replace("~$origin~", $end, $class);
            
            // trim beginning or trailing namespace delimiters
            $class = trim($class, "\\"); 
        }

        return $class;
    }

    /**
     * Appends given variables to list of substitutions
     *
     * @param string $origin Origin of substitutions
     * @param string $end    End of substitutions
     *
     * @return void
     */
    public function addSubstitution($origin, $end)
    {
        $this->_substitutions[] = [$origin => $end];
    }

    /**
     * Sets basePath
     *
     * @param string $path Path
     *
     * @return void
     */
    public function setBasePath($path)
    {
        $this->basePath = rtrim($path, "/\\");
    }

    /**
     * Returns base path
     *
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }
}

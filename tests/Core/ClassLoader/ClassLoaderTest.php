<?php
/**
 * Test for ClassLoader
 *
 * PHP version 5.6
 *
 * @category Test
 * @package  Tests\Core\ClassLoader
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */

//namespace Tests\Core\ClassLoader

use App\Core\ClassLoader\ClassLoader;

/**
 * Class ClassLoaderTest
 *
 * @category Test
 * @package  Tests\Core\ClassLoader
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */
class ClassLoaderTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test classToPath method
     *
     * @return void
     */
    public function testClassToPath()
    {
        $classLoader = new ClassLoader();

        $class = "Some\\Name\\Space\\Class";
        $expectedPath = join(
            DIRECTORY_SEPARATOR,
            ["Some", "Name", "Space", "Class.php"]
        );
        $path = $classLoader->classToPath($class);

        $this->assertSame($expectedPath, $path);
    }

    /**
     * Tests classToPath method with substitution
     *
     * @return void
     */
    public function testClassToPathWithSubstitution()
    {
        $classLoader = new ClassLoader();
        $classLoader->addSubstitution("^App", "");

        $class = "App\\NS\\Class";

        $expected = join(
            DIRECTORY_SEPARATOR,
            ["NS", "Class.php"]
        );

        $path = $classLoader->classToPath($class);

        $this->assertSame($expected, $path);
    }

    /**
     * Tests substitute
     *
     * @return void
     */
    public function testSubstitute()
    {
        $classLoader = new ClassLoader();

        $classLoader->addSubstitution("^App", "");

        $expected = "Thing\\File.php";
        $class = "App\\$expected";

        $result = $classLoader->substitute($class);

        $this->assertSame($expected, $result);
    }

    /**
     * Tests multiple substitutions
     *
     * @return void
     */
    public function testMultipleSubstitutions()
    {
        $classLoader = new ClassLoader();

        $classLoader->addSubstitution("PRE", "");
        $classLoader->addSubstitution("^App", "Base");

        $expected = "Base\\Path\\Class";
        $class = "PREApp\\Path\\PREClass";

        $result = $classLoader->substitute($class);

        $this->assertSame($expected, $result);
    }

    /**
     * Test findClass method
     *
     * @return void
     */
    public function testFindClass()
    {
        $classLoader = new ClassLoader();

        $classLoader->setBasePath(__DIR__);

        $expected = __FILE__;

        $result = $classLoader->findClass(get_class($this));

        $this->assertSame($expected, $result);
    }

    /**
     * Tests findClass against non-existent file
     *
     * @return void
     */
    public function testFindClassNotExists()
    {
        $classLoader = new ClassLoader();

        $classLoader->setBasePath("/dev/null");

        $result = $classLoader->findClass("non-existent");

        $this->assertFalse($result);
        
    }

    /**
     * Tests getAbsolutePath method
     *
     * @return void
     */
    public function testAbsolutePath()
    {
        $classLoader = new ClassLoader();

        $classLoader->setBasePath("x\\y");

        $result = $classLoader->getAbsolutePath("f");

        $this->assertSame("x\\y" . DIRECTORY_SEPARATOR . "f", $result);
    }

    /**
     * Test method
     *
     * @return void
     */
    public function testSetBasePathTrimsSlashes()
    {
        $classLoader = new ClassLoader();

        $classLoader->setBasePath("/dev/null/");

        $this->assertSame("/dev/null", $classLoader->getBasePath());
    }
}

<?php
/**
 * Test of first function written in Tinify
 *
 * PHP version 5.6
 *
 * @category Test
 * @package  None
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */

require "../src/first.php";

/**
 * Class FirstTest
 *
 * @category Category_(Tests/Game/...)
 * @package  Name\Space
 * @author   Michal Hojgr <michal.hojgr@gmail.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/4.0/ Creative Commons
 * @link     <<<MASS-REPLACE-LINK>>>
 */
class FirstTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test
     *
     * @return void
     */
    public function testFirst()
    {
        $out = return1();

        $this->assertEquals(1, $out);
    }
}

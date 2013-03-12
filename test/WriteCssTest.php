<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=76; */

/**
 * Tests for `writeCSS`.
 *
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */


require_once '../PHP_CSS.php';


class WriteCssTest extends PHPUnit_Framework_TestCase
{


    /**
     * `writeCSS` should convert an array into a CSS string.
     */
    public function testwriteCSS()
    {
        $this->assertEquals(PHP_CSS::writeCSS(array(
            'sel1' => array(
                'prop1' => 'val1',
                'prop2' => 'val2'
            ),
            'sel2' => array(
                'prop3' => 'val3',
                'prop4' => 'val4'
            )
        )),
            'sel1 {\n  prop1: val1;\n  prop2: val2;\n}\n\n'.
            'sel2 {\n  prop3: val3;\n  prop4: val4;\n}'
        );
    }


    /**
     * `$breaks` should set the number of blank lines between rule sets.
     */
    public function testBreaks()
    {
        $this->assertEquals(PHP_CSS::writeCSS(array(
            'sel1' => array(
                'prop1' => 'val1'
            ),
            'sel2' => array(
                'prop2' => 'val2',
            )
        ), 2),
            // 2 blank lines after closing }.
            'sel1 {\n  prop1: val1;\n}\n\n\n'.
            'sel2 {\n  prop2: val2;\n}'
        );
    }


    /**
     * `$indent` should set the rule indentation width.
     */
    public function testIndent()
    {
        $this->assertEquals(PHP_CSS::writeCSS(array(
            'sel' => array('prop' => 'val')
        ), null, 4),
            // 4-space indentation.
            'sel {\n    prop: val;\n}'
        );
    }


}

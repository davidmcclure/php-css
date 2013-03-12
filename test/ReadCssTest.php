<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=76; */

/**
 * Tests for `readCss`.
 *
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */


require_once '../PHP_CSS.php';


class ReadCssTest extends PHPUnit_Framework_TestCase
{


    /**
     * `readCss` should convert a CSS string into an array.
     */
    public function testReadCss()
    {
        $this->assertEquals(PHP_CSS::readCss("
            sel1 {
                prop1: val1;
                prop2: val2;
            }
            sel2 {
                prop3: val3;
                prop4: val4;
            }
        "), array(
            'sel1' => array(
                'prop1' => 'val1',
                'prop2' => 'val2'
            ),
            'sel2' => array(
                'prop3' => 'val3',
                'prop4' => 'val4'
            )
        ));

$string = PHP_CSS::writeCss(array(
    'selector1' => array(
        'property1' => 'value1',
        'property2' => 'value2'
    ),
    'selector2' => array(
        'property3' => 'value3',
        'property4' => 'value4'
    )
));

echo $string;

    }


}

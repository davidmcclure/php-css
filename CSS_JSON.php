<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=76; */

/**
 * Convert CSS to JSON, JSON to CSS.
 *
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */


class CSS_JSON {


    /**
     * Convert CSS to JSON.
     *
     * @param string $css CSS string.
     * @return string $json JSON string.
     */
    public static function cssToJson($css)
    {

    }


    /**
     * Convert JSON to CSS.
     *
     * @param string $json JSON string.
     * @return string $css CSS string.
     */
    public static function jsonToCss($json)
    {

    }


    /**
     * Map a CSS string to an associative array.
     *
     * @param string $css CSS string.
     * @return array $styles An array of rules.
     */
    public static function readCss($css)
    {

    }


    /**
     * Dump an associative array to a CSS string.
     *
     * @param array $styles An array of rules.
     * @param integer $breaks Number of empty lines between rule sets.
     * @param integer $indent Number of spaces to indent rules.
     * @return string $css CSS string.
     */
    public static function writeCss($styles, $breaks=1, $indent=2)
    {

        $css = '';

        $len = count($styles); $i = 0;
        foreach ($styles as $selector => $rules) {

            // selector {
            $css .= $selector.' {\n';
            foreach ($rules as $prop => $val) {

                // property: value;
                $css .= str_repeat(' ' , $indent).$prop.': '.$val.';\n';

            }

            // }
            $css .= '}';
            if ($i != $len-1) $css .= str_repeat('\n', $breaks+1);

            $i++;

        }

        return $css;

    }


}

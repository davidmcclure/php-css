<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=76; */

/**
 * Read and write CSS with PHP. Stupid simple.
 *
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */


class PHP_CSS {


    /**
     * Map a CSS string to an associative array.
     *
     * @param string $css CSS string.
     * @return array $styles An array of rules.
     */
    public static function readCss($css)
    {

        $styles = array();

        // Match rule sets.
        $re = '/[^{]+\s*\{\s*[^}]+\s*}/';
        preg_match_all($re, $css, $matches);
        foreach ($matches[0] as $set) {

            // Match selector.
            $re = '/(?P<selector>[.#a-z0-9-]+)\s*\{/';
            preg_match($re, $set, $matches);
            $selector = $matches['selector'];
            $styles[$selector] = array();

            // Match rules.
            $re = '/[a-z0-9-]+:\s*[^;]+;/';
            preg_match_all($re, $set, $matches);
            foreach ($matches[0] as $rule) {

                // Match property.
                $re = '/(?P<property>[a-z0-9-]+)\s*:/';
                preg_match($re, $rule, $matches);
                $prop = $matches['property'];

                // Match value.
                $re = '/:\s*(?P<value>[^;]+)\s*;/';
                preg_match($re, $rule, $matches);
                $val = $matches['value'];

                // Add to array.
                $styles[$selector][$prop] = $val;

            }

        }

        return $styles;

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
        $len = count($styles);
        $i = 0;

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

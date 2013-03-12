# PHP-CSS

Read and write CSS in PHP. Stupid simple, tested.

## CSS to PHP

```php
$css = PHP_CSS::readCss("
    selector1 {
        property1: value1;
        property2: value2;
    }
    selector2 {
        property3: value3;
        property4: value4;
    }
");

print_r($css);

>>> Array
(
    [selector1] => Array
        (
            [property1] => value1
            [property2] => value2
        )

    [selector2] => Array
        (
            [property3] => value3
            [property4] => value4
        )

)
```

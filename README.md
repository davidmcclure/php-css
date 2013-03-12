# PHP &harr; CSS

Read and write CSS in PHP. Stupid simple. ~100 loc. Tested.

### CSS &rarr; PHP

```php
$array = PHP_CSS::readCss("
    selector1 {
        property1: value1;
        property2: value2;
    }
    selector2 {
        property3: value3;
        property4: value4;
    }
");

print_r($array);
```

```bash
Array
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

### PHP &rarr; CSS

```php
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
```

```bash
selector1 {
  property1: value1;
  property2: value2;
}

selector2 {
  property3: value3;
  property4: value4;
}
```

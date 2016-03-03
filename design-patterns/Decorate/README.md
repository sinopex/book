## 装饰模式

```php
<?php
/**
 * Index.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/2 14:34
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Decorate;

require 'Dom.php';
require 'Style.php';
require 'StyleColor.php';
require 'StyleFontBolder.php';
require 'StyleFontSize.php';

$dom = new Dom('Hello,Patterns');

//加颜色
$dom = (new StyleColor())->decorate($dom);

//加粗
$dom = (new StyleFontBolder())->decorate($dom);

//加字体大小
$dom = (new StyleFontSize())->decorate($dom);

echo $dom->render();
```
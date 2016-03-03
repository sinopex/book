## 简单工厂模式

```php
<?php
/**
 * index.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/1 15:56
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */

namespace designPatterns\Factory;

$db = (new DbFactory)->getInstance(DbFactory::DB_MSSQL);

$db->find(['user_id' => 100, 'name' => 'Allen']);
```
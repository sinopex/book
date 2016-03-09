## 深入浅出MySQL.md

![封面图片](http://img.blog.163.com/photo/VaMaLTmcTQH0dDjmyFJ_zA==/1141381030562357393.jpg)

作者:唐汉明 翟振兴等

出版社:电子工业出版社


#### MySQL 不同版本的重要改进
----

- 4.1 增加了子查询,字符集增加了UTF8的支持
- 5.0 增加了视图/过程/触发器的支持,增加了Information_schema系统数据库
- 5.1beta 增加表分区
- 6.0alpha FALCON存储引擎的支持

#### 常见DDL语法
----

- 修改表字段 `alter table table_name modify [column_name] column_definition [first|after col_name]`
- 增加表字段 `alter table table_name add [column] column_definition [first|after_col_name]`
- 删除表字段 `alter table drop [column] col_name`
- 表字段改名 `alter table table_name change [column] old_col_name column_definition`
- 修改表名   `alter table table_name rename to new_table_name`

#### DCL语法
----

- 授权 `grant select,insert on test.* to 'zy1'@'localhost' identified by '123'`

- 收回 `revoke select on test.* from 'zy1'@'localhost'`

#### 子查询的关键字
----

- in
- not ni
- =
- !=
- exists
- not exists3

#### MySQL数值类型的字节长度
----

|类型|字节|
|:--:|:--:|
|tinyint|1|
|smallint|2|
|mediumint|3|
|int|4|
|bigint|8|
|float|4|
|double|8|
|decimal(m,d)|m+2|
|bit(m)|1-8|

#### MySQL时间类型的字节长度
----

|类型|字节|
|:--:|:--:|
|date|4|
|datetime|8|
|timestamp|4|
|time|3|
|year|1|

#### MySQL enum与set类型
----

enum允许最多有65535个成员,对于-255个成员的枚举需要1个字节存储,对于255-65535个成员,需要2个字节存储


set类型可以一次选取多个成员,里面可以包括0-64个成,不同的成员所占字节空间大小也不同,如下所示:

- 1-8个成员   占1个字节
- 9-16个成员  占2个字节
- 17-24个成员 占3个字节
- 15-32个成员 占4个字节
- 33-64个成员 占8个字节

#### MySQL中的流程函数

|函数|功能|
|---|---|
|IF(value,t,f)|如果value为真返回t,否则返回f|
|IFNULL(value1,value2)|如果value1不为空返回value1,否则返回value2|
|CASE WHEN [value1] THEN result1 ...ELSE [default] END|如果value1是真,返回result1,否则返回default|
|CASE [expr] WHEN value1 THEN [result]... ELSE [default] END|如果`expr`表达式等于value1返回result1,否则返回default|


#### MySQL存储引擎

##### MyISAM

每个MyISAM在磁盘上存储成3个文件，其中文件名和表名都相同，但是扩展名分别为：

- .frm(存储表定义)
- MYD(MYData，存储数据)
- MYI(MYIndex，存储索引)
　　
数据文件和索引文件可以放置在不同的目录，平均分配IO，获取更快的速度。要指定数据文件和索引文件的路径，需要在创建表的时候通过DATA DIRECTORY和INDEX DIRECTORY语句指定，文件路径需要使用绝对路径。
每个MyISAM表都有一个标志，服务器或myisamchk程序在检查MyISAM数据表时会对这个标志进行设置。MyISAM表还有一个标志用来表明该数据表在上次使用后是不是被正常的关闭了。如果服务器以为当机或崩溃，这个标志可以用来判断数据表是否需要检查和修复。如果想让这种检查自动进行，可以在启动服务器时使用--myisam-recover现象。这会让服务器在每次打开一个MyISAM数据表是自动检查数据表的标志并进行必要的修复处理。MyISAM类型的表可能会损坏，可以使用CHECK TABLE语句来检查MyISAM表的健康，并用REPAIR TABLE语句修复一个损坏到MyISAM表。

MyISAM的表还支持3种不同的存储格式：

- 静态(固定长度)表
- 动态表
- 压缩表
　　
其中静态表是默认的存储格式。静态表中的字段都是非变长字段，这样每个记录都是固定长度的，这种存储方式的优点是存储非常迅速，容易缓存，出现故障容易恢复；缺点是占用的空间通常比动态表多。静态表在数据存储时会根据列定义的宽度定义补足空格，但是在访问的时候并不会得到这些空格，这些空格在返回给应用之前已经去掉。同时需要注意：在某些情况下可能需要返回字段后的空格，而使用这种格式时后面到空格会被自动处理掉。

动态表包含变长字段，记录不是固定长度的，这样存储的优点是占用空间较少，但是频繁到更新删除记录会产生碎片，需要定期执行OPTIMIZE TABLE语句或myisamchk -r命令来改善性能，并且出现故障的时候恢复相对比较困难。
　　
压缩表由myisamchk工具创建，占据非常小的空间，因为每条记录都是被单独压缩的，所以只有非常小的访问开支。 

##### InnoDB

InnoDB存储引擎提供了具有提交、回滚和崩溃恢复能力的事务安全。但是对比MyISAM的存储引擎，InnoDB写的处理效率差一些并且会占用更多的磁盘空间以保留数据和索引。

1)自动增长列：
　　
InnoDB表的自动增长列可以手工插入，但是插入的如果是空或0，则实际插入到则是自动增长后到值。可以通过"ALTER TABLE...AUTO_INCREMENT=n;"语句强制设置自动增长值的起始值，默认为1，但是该强制到默认值是保存在内存中，数据库重启后该值将会丢失。可以使用LAST_INSERT_ID()查询当前线程最后插入记录使用的值。如果一次插入多条记录，那么返回的是第一条记录使用的自动增长值。

对于InnoDB表，自动增长列必须是索引。如果是组合索引，也必须是组合索引的第一列，但是对于MyISAM表，自动增长列可以是组合索引的其他列，这样插入记录后，自动增长列是按照组合索引到前面几列排序后递增的。

2)外键约束：
　　
MySQL支持外键的存储引擎只有InnoDB，在创建外键的时候，父表必须有对应的索引，子表在创建外键的时候也会自动创建对应的索引。
      
在创建索引的时候，可以指定在删除、更新父表时，对子表进行的相应操作，包括restrict、cascade、set null和no action。其中restrict和no action相同，是指限制在子表有关联的情况下，父表不能更新；casecade表示父表在更新或删除时，更新或者删除子表对应的记录；set null 则表示父表在更新或者删除的时候，子表对应的字段被set null。
　　
当某个表被其它表创建了外键参照，那么该表对应的索引或主键被禁止删除。
　　
可以使用set foreign_key_checks=0;临时关闭外键约束，set foreign_key_checks=1;打开约束。

MySQL5.5以后默认使用InnoDB存储引擎

#### 巧用RAND()提取随机行

从所有记录中随机提取一行记录:

`SELECT * FROM USER ORDER BY RAND() LIMIT 1`

#### 正则表达式查询
----

`SELECT * FROM USER WHERE name regexp '^test_'`

#### MySQL大小写敏感区分
----

> lower_case_file_system：数据库所在的文件系统对文件名大小写敏感度。

ON表示大小写不敏感 OFF表示敏感

> lower_case_table_names：表名大小写敏感度

- 0表示使用Create语句指定的大小写保存文件
- 1表示大小写敏感，文件系统以小写保存
- 2表示使用Create语句指定的大小写保存文件，但MyS

#### 存在索引但不会使用的情况
----

- Heap引擎下只在操作符`=`下才使用引擎
- 用Or分割开的条件,如果or前的条件列有索引,但是后面的列没有索引,则不会使用索引(OR所有条件列都必须有索引才能生效)
- 对于符合索引,不是索引的第一部分
- `like`语句以`%`开头的无法使用索引
- 如果列是字符串,如果没有用引号括起来,也不会用到索引

#### SQL优化步骤
----

- 通过`show [global|session] status`命令了解各种SQL的执行频率
- 定位执行效率低的SQL语句
- 使用`show processlist`查看当前MySQL在进行的线程
- 通过explain分析低效的SQL语句

#### 常用SQL优化
----

##### 大批量插入数据

对于MyISAM存储引擎的表,可通过以下方法快速的导入数据:

```sql
ALTER TABLE tbl_name DISABLE KEYS;
loading the data
ALTER TABLE tbl_name ENABLE KEYS;
```

前后两句分别是关闭和打开非唯一索引的更新


对于InnoDB存储引擎的表,以上方式不能提高导入的效率,可以通过以下方式来提供InnoDB表的导入效率

1) 因为InnoDB类型的表是按照主键顺序保存的,所以将导入的数据按照主键的顺序排列,可以有效地提高导入数据的效率

2) 在导入数据前执行`SET UNIQUE CHECK = 0`,关闭唯一性校验,在导入结束后执行`SET UNIQUE CHECK = 1`恢复唯一性校验

3) 如果应用是自动提交的方式,在导入前执行`SET AUTOCOMMIT = 0`,关闭自动提交,导入结束后执行`SET AUTOCOMMIT = 1`再度开启自动提交模式

##### 优化Insert语句

当进行数据INSERT的时候,可以考虑采用以下几种优化方式:

1) 如果同时从同一客户端插入很多行,尽量采用多个值表的insert语句(`insert into tbl_name(..) values(),(),()...`)

2) 如果从不同客户端插入很多行,能通过使用`INSERT DELAYED`语句得到更高的速度,`DELAYED`语句是让`INSERT`语句马上执行,而不是写入内存队列

3) 将索引文件和数据文件分在不同的磁盘上存放(利用建表中的选项)

4) 如果进行批量插入,可以增加`bulk_insert_buffer_size`变量值的方法来提高速度,但是只能针对MyISAM存储引擎

5) 当从一个文本文件装在一个表时,利用`LOAD DATA INFILE`,这种方式比通常的`INSERT`方法快将近20倍

##### 优化`GROUP BY`语句

默认情况下,MySQL对所有的`GROUP BY col1,col2,....`的字段进行排序,与`ORDER BY col1,col2`类似.

如果查询包括`GROUP BY`但是用户想要避免排序结果的消耗,则可以指定`ORDER BY NULL`禁止排序

##### 使用SQL提示

> USE INDEX

添加`USE INDEX`希望MySQL参考索引列表

`SELECT * FROM sale use index(idx_order_id) where id=:id`

> IGNORE INDEX

希望MySQL忽略一个或者多个索引,则可以使用`IGNORE INDEX`作为HINT

`SELECT * FROM sale ignore index(idx_order_id) where id=:id`

> FORCE INDEX

为强制MySQL使用一个特定的索引,可在查询中使用`FORCE INDEX`作为HINT

`SELECT * FROM sale force index(idx_order_id) where id=:id`

#### MySQL锁问题
----

MySQL支持3种锁:

- 表级索(MyISAM):开销小,加锁快,不会出现死锁,锁定粒度大,发生锁冲突的概率最高,并发度最低
- 行级索(InnoDB):开销大,加锁慢,会出现死锁,锁定粒度最小,发生锁冲突的概率最低,并发度最高
- 页级索(BDB):开销和加锁介于二者之间,会出现死锁,并发度一般


##### MyISAM表索

查看表级所争用情况:

`show status like 'table%'`

- `table_locks_immediate`
- `table_locks_waited`

> 锁模式

读操作,不会阻塞其它用户访问同一表的读请求,但是会阻塞对同一表的写请求

写操作,会同时阻塞用户对同一表的读和写请求

> 如何加锁


```sql

lock tables order read local,order_detail read local

select sum(total) from order;

select sum(subtotal) from order_detail;

unlock tables;

```

- `local`选项其作用就是在满足MyISAM表并发插入的情况下,允许其它用户在表尾并发插入数据
- 在用`lock tables`给表显示加锁时,必须同时取得所有涉及表的锁,并且MySQL不支持锁升级,加锁期间只能访问加锁的表
- 当使用`lock tables`时,同一表出现多次,就要通过别名锁定多少次,否则会出错

> 并发插入(Concurrent Inserts)

MySQL可以通过修改`concurrent insert`系统变量,控制并发插入的行为

- `concurrent_insert = 0` 不允许并发插入
- `concurrent_insert = 1` 如果MyISAM中没用空洞,允许在一个进程读表的同时,另一个进程从表尾插入记录,这是默认设置
- `concurrent_insert = 2` 无论有没有空洞,都允许从表尾插入记录

##### InnoDB锁问题


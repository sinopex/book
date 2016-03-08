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


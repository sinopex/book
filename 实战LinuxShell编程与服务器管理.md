## 实战LinuxShell编程与服务器管理.md

![封面图片](https://img1.doubanio.com/lpic/s6144553.jpg)

作者:卧龙小三

出版社:电子工业出版社

----- 

Linux/BSD系统分为三个重要组成部分:

- 核心(Kernel)
- Shell
- 工具程序

#### 查询操作系统的shell环境与版本
----- 

```bash
#!/bin/bash

#查看bash默认类型
echo $SHELL

#查看版本号
echo $BASH_VERSION
```

#### 当服务器日志文件很大时,利用特殊文件/dev/null(只写文件)来清理:
----- 

```bash
#!/bin/bash

cp /dev/null/ /var/log/nginx/access.log
```

#### Unix-like的操作系统中,一切皆为文件,文件可分成几种
-----

- 一般文件(文本文件,二进制文件)
- 目录(文件夹,代码)
- 设备文件(字符文件,磁盘文件)
- 内部进程通信文件(Socket文件,Pipe/FIFO文件)
- 特殊文件(符号链接文件,可看成是快捷方式)
- 隐藏文件

不同的文件,各有其代码:


| 符号  | 文件类型  |
|:-------------:|:-------------:|
|-|一般文件|
|d|目录|
|l|符号链接文件|
|b|磁盘设备文件|
|c|字符设备文件|
|s|Socket文件|
|p|连接文件|

#### 关于转义字符:单引号中,不可以出现单引号,就算用转移字符\'也不行
----- 

```bash
#!/bin/bash

#以下bash会提示命令尚未输入完
echo 'This is Jack\'s book.'
```

#### 字符集合
----- 

字符集合的符号为`[]`,含义是`[]`所列其中的某一个字符,长度为1

- [abc] abc中任意一个字符
- [a-z] 小写字母中的任意一个字符
- [a-Z] 大写字母中的任意一个字符
- [0-9] 数字0到9
- [a-zA-Z0-9] 字母和数字
- [!0-9] 非数字
- [!a-z] 非小写字母

> #### 括号扩展

----- 

括号扩展的符号为`{}`,含义是`{}`中的所有组合项,他弥补了字符集合`[]`长度为1的不足

- `echo s{ab,cd}y` 显示saby和scdy
- `ls *.{conf,cf,ini}` 列出指定的后缀名文件
- `ls /bin/z{[ef]gre,cm}p` 查找bin目录下egrep,fgrep,cmp这三程序 
- `echo {1,2,3,4,5,6,7,8,9}\*{1,2,3,4,5,6,7,8,9}` 打印九九乘法表

> #### 父Shell与子Shell


----- 

在执行Shell Script之前,我们已经处于login shell之中,称之为父Shell,当我们执行某个Shell Script时,父Shell会根据Script程序的第一行`#!`之后所指定的Shell程序开启一个子Shell的环境,然后在子Shell中执行此Shell脚本,一但子Shell执行完毕,此子Shell随即结束,返回父Shell之中,不会影响父Shell原本的环境

使用`.`或者`source`会让Script只在父Shell的环境中执行,子shell的执行结果,会影响父Shell的环境,通常在做系统调校时,才会如此运用

命令`echo $SHLVL`可以查看当前终端程序在第几层执行


> #### Bash的运行模式及启动配置文件

----- 

- 互动模式,终端读取键盘命令,一条一条的执行
- 非互动模式,是指执行一个Script程序
- 以sh名称调用
- POSIX模式
- 限制功能模式

在不同的运行模式中,Bash调用不同的启动配置文件,Bash启动配置文件,主要与Shell的环境设定有关,以下详细描述不同模式下的配置文件读取过程

##### 登录(login)

按加载顺序依次排列

- /etc/profile
- $HOME/.bash_profile
- $HOME/.bash_login
- $HOME/.profile

##### 注销(logout)

- $HOME/.bash_logout


##### 执行新shell

以交互方式的Shell

- /etc/bash.bashrc
- $HOME/.bashrc

执行Shell Script

- 读取检查BASN_ENV变量内容


## 实战LinuxShell编程与服务器管理.md

![封面图片](https://img1.doubanio.com/lpic/s6144553.jpg)

作者:卧龙小三

出版社:电子工业出版社

#### Linux/BSD系统的三个组成部分
----

- 核心(Kernel)
- Shell
- 工具程序

#### 查询操作系统的shell环境与版本
----

```bash
#!/bin/bash

#查看bash默认类型
echo $SHELL

#查看版本号
echo $BASH_VERSION
```

#### 快速清理大日志文件
----- 

当服务器日志文件很大时,利用特殊文件/dev/null(只写文件)来清理:

```bash
#!/bin/bash

cp /dev/null/ /var/log/nginx/access.log
```

#### Unix-like操作系统中的文件类型
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

#### 转义字符
----- 

> 单引号中,不可以出现单引号,就算用转移字符\'也不行

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

#### 括号扩展
----- 

括号扩展的符号为`{}`,含义是`{}`中的所有组合项,他弥补了字符集合`[]`长度为1的不足

- `echo s{ab,cd}y` 显示saby和scdy
- `ls *.{conf,cf,ini}` 列出指定的后缀名文件
- `ls /bin/z{[ef]gre,cm}p` 查找bin目录下egrep,fgrep,cmp这三程序 
- `echo {1,2,3,4,5,6,7,8,9}\*{1,2,3,4,5,6,7,8,9}` 打印九九乘法表

#### 父Shell与子Shell
----- 

在执行Shell Script之前,我们已经处于login shell之中,称之为父Shell,当我们执行某个Shell Script时,父Shell会根据Script程序的第一行`#!`之后所指定的Shell程序开启一个子Shell的环境,然后在子Shell中执行此Shell脚本,一但子Shell执行完毕,此子Shell随即结束,返回父Shell之中,不会影响父Shell原本的环境

使用`.`或者`source`会让Script只在父Shell的环境中执行,子shell的执行结果,会影响父Shell的环境,通常在做系统调校时,才会如此运用

命令`echo $SHLVL`可以查看当前终端程序在第几层执行

#### Bash的运行模式及启动配置文件
----- 

- 互动模式,终端读取键盘命令,一条一条的执行
- 非互动模式,是指执行一个Script程序
- 以sh名称调用
- POSIX模式
- 限制功能模式

在不同的运行模式中,Bash调用不同的启动配置文件,Bash启动配置文件,主要与Shell的环境设定有关,以下详细描述不同模式下的配置文件读取过程

**登录(login)**

按加载顺序依次排列

- /etc/profile
- $HOME/.bash_profile
- $HOME/.bash_login
- $HOME/.profile

**注销(logout)**

- $HOME/.bash_logout


**执行新shell**

以交互方式的Shell

- /etc/bash.bashrc
- $HOME/.bashrc

执行Shell Script

- 读取检查BASH_ENV变量内容

#### Bash指令类型
-----

Bash Shell Script分为"内置"和"命令行两种",用`type echo`可以判断指令的类型

***内置命令***

Bash Shell的内置命令,不必再去程序路径查找,直接就可以调用

常见的内置命令有:

`alias,bg,bind,break,builtin,case,cd,command,compgen,complete,continue,declare,dirs,disown,echo,enable,eval,exec,exit,export,fc,fg,for,getopts,hash,help,history,if,jobs,kill,let,local,logout,popd,printf,pushd,pwd,read,readonly,return,set,shift,shopt,source,suspend,test,time,trap,type,typeset,ulimit,umask,unalias,until,wait,while`

一些技巧和用例:

- `echo -e "Hello\nWorld"` 选项`-e`可让字符串中的特殊字符起作用
- `help -s test` 选项`-s`显示内置命令的语法格式
- `cd -`回到先前的目录
- `cd`,`cd ~` 回到主目录
- `fc -l` 列出主机登录后最近执行过的指令
- `set` 显示Bash Shell的属性
- `set -o emacs` 开启配置
- `set +o emacs` 关闭配置
- `set -v` 这个选项会使Bash在执行Script时,将其所读入的每一程序代码显示出来,通常用于程序调试
- `shopt` 设定Bash Shell的行为模式
- `time 程序/命令` 在Script执行之后显示real,user,cpu3种耗用时间的统计
- `read` 由标准输入读入一行数据
- `exec 程序/命令` 执行指定的程序,取代原来的Shell,或使转向操作生效
- `eval` 读取参数,结合生成一个新指令,在进行变量替换后,予以执行


***命令行程序***

命令行执行程序是单独存在的文件,执行前,Shell会在程序的搜寻路径($PATH)中寻找

常见的命令行程序有:

`cp,date,who,w,ls,cat,wc,last,mv,mkdir,rmdir,mv,ps,top,df,du,dd,ln,sort,sed,awk,ifconfig,dmesg,diff,hostname,dnsdomainname,chmod,chown,chgrp,cut,grep,find,kill,more,less,mount,nice,ping,sleep,su,tar,gzip,xargs,touch,uname,basename,dirname,tr,uniq,mail,which,locate`

一些技巧和用例:

- `which 命令` 查找命令的程序路径,`-a`选项列出所有`$PATH`下符合的结果
- `locate 关键词` 在文件数据库中,查找包含有"关键词"的文件路径,全部显示
- `date` 显示/设定系统的日期和时间,如:`date +'%Y-%m-%d %H:%I:%S'`显示24进制的详细时间
- `who` 显示目前登陆主机的用户
- `cat` 链接文件内容并显示出来
- `ln f1 f2` 将f2链接到f1
- `find 路径 样式 操作` 在分层目录中查找文件
- `find . -name '*.txt' -exec rm -f {} \;`查找文件并删除
- `find /root -type d -print` 查询所有文件夹并打印
- `sort -nr -k3 -t: /etc/passwd` 已`:`为分割符,按照第三列的数字大写降序排序

- `uniq 文件` 对已排序好的文件删除重复行,注意:若重复行并未连续在一起,则不会有任何作用
- `uniq -d 文件` 显示重复行
- `uniq -c 文件` 计算每一行的重复次数

- `cut` 对文件的每一行抽出一部分
- `cut -c2 文件` 抽出文件中每一行的第2个字符
- `cut -c2-10 文件` 抽出文件中每一行的第2到10的字符
- `cut -c2-10,13-18 文件` 抽出文件中每一行的第2到10和13-18的字符
- `cut -c6- 文件` 抽出文件中每一行的第6到结尾的字符
- `cut -d: -f1 文件` 抽出文件各行的第一个字段

- `paste` 对文件以行和行的凡是合并
- `paste data1 data2` 将两个文件的每一行合并,默认用`Tab`分隔
- `paste -d# data1 data2` 将两个文件的每一行合并,并以`#`合并
- `paste -s data1` 将文件的每一行自己合并

- `tr` 转换或者删除字符
- `tr k K < data1` 将data1中的k换成K
- `tr -d K data1` 将data1中的K全部删除
- `tr -d: -f1-6 /etc/passwd | tr : '+'` 将passwd的6栏用`+`分割
- `tr '[A-Z]' '[a-z]' < data1` 将data1中的大写全换成小写
- `tr '[a-z]' '[A-Z]' < data1` 将data1中的小写全换成大写
- `tr -s ' ' ' ' < data1` 将多余的空白删除只剩一个,`-s`是挤压的意思


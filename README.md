# x-support-tree

## 安装
~~~
composer require limingxinleo/x-support-tree
~~~

## 使用
~~~php
<?php
$nodes = new Tree($this->testArr, 'id', 'pid', 'nodes');

$treeArray = $nodes->toTree()->toArray();
~~~

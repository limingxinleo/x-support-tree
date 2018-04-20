<?php
// +----------------------------------------------------------------------
// | Tree.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Xin\Support;

class Tree
{
    public function __construct($items, $id = 'id', $pid = 'pid', $children = 'children')
    {
        foreach ($items as $item) {
            $key = 'id_' . $item[$id];
            $this->$key = new Node($item, $id, $pid, $children);
        }
    }

    public function toTree()
    {
        foreach ($this as $item) {
            if ($item->_pid > 0) {
                $key = 'id_' . $item->_pid;
                $this->$key->_children[] = $item;
            }
        }

        return $this;
    }

    public function toArray()
    {
        $result = [];
        foreach ($this as $item) {
            if ($item->_pid == 0) {
                $result[] = $item->toArray();
            }
        }

        return $result;
    }


    public function __get($name)
    {
        $key = 'id_' . $name;
        return $key;
    }
}
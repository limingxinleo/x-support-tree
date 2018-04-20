<?php
// +----------------------------------------------------------------------
// | Node.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Xin\Support;

class Node
{
    public $_id;

    public $_pid;

    public $_children = [];

    protected $_childField;

    public $_node;

    public function __construct($node, $id = 'id', $pid = 'pid', $children = 'children')
    {
        $this->_id = $node[$id];
        $this->_pid = $node[$pid];
        $this->_childField = $children;

        $this->_node = $node;
    }

    public function toArray()
    {
        $result = $this->_node;
        $result[$this->_childField] = [];
        foreach ($this->_children as $child) {
            $result[$this->_childField][] = $child->toArray();
        }
        return $result;
    }
}
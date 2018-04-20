<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Test;

use limx\Support\Arr;
use PHPUnit\Framework\TestCase;
use Xin\Support\Node;
use Xin\Support\Tree;

class BaseTest extends TestCase
{
    private $testArr = [
        ['id' => 1, 'pid' => 0],
        ['id' => 2, 'pid' => 1],
        ['id' => 3, 'pid' => 1],
        ['id' => 4, 'pid' => 2],
        ['id' => 5, 'pid' => 3],
    ];

    public function testBaseCase()
    {
        $nodes = new Tree($this->testArr);

        $treeArray = $nodes->toTree()->toArray();
        $this->assertEquals(1, $treeArray[0]['id']);
        $this->assertEquals(0, $treeArray[0]['pid']);
        $this->assertEquals(2, $treeArray[0]['children'][0]['id']);
    }

    public function testChildrenFiledCase()
    {
        $nodes = new Tree($this->testArr, 'id', 'pid', 'nodes');

        $treeArray = $nodes->toTree()->toArray();
        $this->assertEquals(1, $treeArray[0]['id']);
        $this->assertEquals(0, $treeArray[0]['pid']);
        $this->assertEquals(2, $treeArray[0]['nodes'][0]['id']);
    }
}
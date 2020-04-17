<?php

/**
 * 给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
*如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。
*您可以假设除了数字 0 之外，这两个数都不会以 0 开头。
*示例：

*输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
*输出：7 -> 0 -> 8
*原因：342 + 465 = 807
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $l1 = $this->filterListNode($l1);
        $l2 = $this->filterListNode($l2);
        $total = $l1+$l2;
        $total = (string)$total;
        $result = array();
        for($i=strlen($total)-1;$i>=0;$i--){
            $result[] = $total[$i];
        }
        $listNode = new ListNode($result[0]);
        return $this->createListNode($result,1,$listNode);
    }

    function filterListNode($listNode){
        $num = $listNode->val;
        $next = $listNode->next;
        while($next){
            $num = $num.$next->val;
            $next = $next->next;
        }
        return intval(strrev($num));
    }

    function createListNode($result,$i,$listNode)
    {
        if (isset($result[$i])){
            $listNode->next = new ListNode($result[$i]);
            $i++;
            $listNode->next = $this->createListNode($result,$i,$listNode->next);
        }
        return $listNode;
    }
}

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

$arr1 = [2,4,3];
$arr2 = [5,6,4];


$solution = new Solution();
$l1 = new ListNode($arr1[0]);
$l1 = $solution->createListNode($arr1,1,$l1);
$l2 = new ListNode($arr2[0]);
$l2 = $solution->createListNode($arr2,1,$l2);
$result = $solution->addTwoNumbers($l1,$l2);
$num[] = $result->val;
$next = $result->next;
while($next){
    $num[] = $next->val;
    $next = $next->next;
}
var_dump($num);

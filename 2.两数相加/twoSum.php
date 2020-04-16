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
        for($i=strlen($total)-1;$i>=0;$i--){
            $result[] = $total[$i];
        }
        return $result;
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
}

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

$arr1 = [2,4,3];
$arr2 = [5,6,4];
$l1 = new ListNode(2);
$l1->next = new ListNode(4);
$l1->next->next = new ListNode(3);

$l2 = new ListNode(5);
$l2->next = new ListNode(6);
$l2->next->next = new ListNode(4);

$solution = new Solution();
$result = $solution->addTwoNumbers($l1,$l2);
var_dump($result);

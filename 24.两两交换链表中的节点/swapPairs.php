<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head)
    {
        // 递归函数的含义，返回后续所有节点两两交换之后的头节点
        // terminator
        if ($head === null || $head->next === null) {
            return $head;
        }

        $next = $head->next;
        $head->next = $this->swapPairs($next->next);
        $next->next = $head;
        return $next;
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
$solution = new Solution();
$arr = [1,2,3,4];
$head = new ListNode($arr[0]);
$head = $solution->createListNode($arr,1,$head);
$listNode = $solution->swapPairs($head);
$swap[] = $listNode->val;
$next = $listNode->next;
while($next){
    $swap[] = $next->val;
    $next = $next->next;
}
var_dump($swap);
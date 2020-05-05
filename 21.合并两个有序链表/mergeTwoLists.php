<?php
// 将两个升序链表合并为一个新的升序链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 

// 示例：

// 输入：1->2->4, 1->3->4
// 输出：1->1->2->3->4->4



class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
 
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {

        $arr1[] = $l1->val;
        $next = $l1->next;
        while($next){
            $arr1[] = $next->val;
            $next = $next->next;
        }
        $arr2[] = $l2->val;
        $next = $l2->next;
        while($next){
            $arr2[] = $next->val;
            $next = $next->next;
        }
        $mergeArr = array_merge($arr1,$arr2);
        sort($mergeArr);
        $mergeListNode = new ListNode($mergeArr[0]);
        $mergeListNode = $this->createListNode($mergeArr,1,$mergeListNode);
        return $mergeListNode;
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
$arr1 = ['1','2','4'];
$arr2 = ['1','3','4'];
$l1 = new ListNode($arr1[0]);
$l1 = $solution->createListNode($arr1,1,$l1);
$l2 = new ListNode($arr2[0]);
$l2 = $solution->createListNode($arr2,1,$l2);
$mergeListNode = $solution->mergeTwoLists($l1,$l2);
$mergeArr[] = $mergeListNode->val;
$next = $mergeListNode->next;
while($next){
    $mergeArr[] = $next->val;
    $next = $next->next;
}
var_dump($mergeArr);
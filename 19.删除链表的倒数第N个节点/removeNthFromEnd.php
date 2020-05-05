<?php
// 给定一个链表，删除链表的倒数第 n 个节点，并且返回链表的头结点。

// 示例：

// 给定一个链表: 1->2->3->4->5, 和 n = 2.

// 当删除了倒数第二个节点后，链表变为 1->2->3->5.


//   Definition for a singly-linked list.
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
 
class Solution {

    function createListNode($result,$i,$listNode)
    {
        if (isset($result[$i])){
            $listNode->next = new ListNode($result[$i]);
            $i++;
            $listNode->next = $this->createListNode($result,$i,$listNode->next);
        }
        return $listNode;
    }
    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $pre = new ListNode(0);//加上了头节点，相当于是哨兵，可以简化操作
        $pre->next = $head;
        $start = $pre;//第一个指针
        $end = $pre;//第二个指针

        //第一个指针先遍历$n次，遍历结束的时候是顺数第$n个数据
        while ($n != 0) {
            $start = $start->next;
            $n--;
        }
        //然后第一个指针继续往后遍历到最后一个节点$start->next == null为最后一个节点，注意不要写错
        //第二个指针同步第一个指针遍历的个数，当第一个指针到了最后，第二个指针为要删除的节点的上一个地址
        while ($start->next != null) {
            $start = $start->next;
            $end = $end->next;
        }
        //删除节点
        $end->next = $end->next->next;

        //返回链表
        return $pre->next;
    }
}
$arr = [1,2,3,4,5];
$n = 2;
$head = new ListNode($arr[0]);
$solution = new Solution();
$head = $solution->createListNode($arr,1,$head);
$removeHead = $solution->removeNthFromEnd($head,$n);
$num[] = $removeHead->val;
$next = $removeHead->next;
while($next){
    $num[] = $next->val;
    $next = $next->next;
}
var_dump($num);
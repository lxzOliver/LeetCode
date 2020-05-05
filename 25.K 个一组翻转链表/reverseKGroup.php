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
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        if ($head == null) {
            return $head;
        }
        $cnt = $k;
        $pre = null;
        $cur = $head;
        while ($cur && $cnt-- > 0) {
            $next      = $cur->next;
            $cur->next = $pre;
            $pre       = $cur;
            $cur       = $next;
        }
        if ($cnt > 0) {
            $next =  $this->reverseKGroup($pre, $k - $cnt);
            return $next;
        }else{
            $next = $this->reverseKGroup($cur,$k);
        }
        $head->next = $next;

        return $pre;
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
$arr = [1,2,3,4,5];
$head = new ListNode($arr[0]);
$head = $solution->createListNode($arr,1,$head);
$reverse = $solution->reverseKGroup($head,2);
var_dump($reverse);
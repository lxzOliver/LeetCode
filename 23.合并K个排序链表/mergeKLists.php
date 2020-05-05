<?php
// 合并 k 个排序链表，返回合并后的排序链表。请分析和描述算法的复杂度。

// 示例:

// 输入:
// [
//   1->4->5,
//   1->3->4,
//   2->6
// ]
// 输出: 1->1->2->3->4->4->5->6

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
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $arr = [];
        for($i=0;$i<count($lists);$i++){
            $arr[] = $lists[$i]->val;
            $next = $lists[$i]->next;
            while($next){
                $arr[] = $next->val;
                $next = $next->next;
            }
        }
        $arr = $this->sort($arr);
        $listNode = new ListNode($arr[0]);
        $listNode = $this->createListNode($arr,1,$listNode);
        return $listNode;
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

    function sort($arr){
        for($i=0;$i<count($arr)-1;$i++){
            for($j=$i+1;$j<count($arr);$j++){
                if($arr[$i] > $arr[$j]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $tmp;
                }
            }
        }
        return $arr;
    }
}
$solution = new Solution();
$arr = [[1,4,5],[1,3,4],[2,6]];
$lists = [];
for($i=0;$i<count($arr);$i++){
    if (count($arr) == 0){
        continue;
    }
    for($j=0;$j<count($arr[$i]);$j++){
        $listNode = new ListNode($arr[$i][0]);
        $listNode = $solution->createListNode($arr[$i],1,$listNode);
    }
    $lists[] = $listNode;
}
$mergeKList = $solution->mergeKLists($lists);
$mergeArr[] = $mergeKList->val;
$next = $mergeKList->next;
while($next){
    $mergeArr[] = $next->val;
    $next = $next->next;
}
var_dump($mergeArr);
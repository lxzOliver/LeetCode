<?php

/**
 *
 * 给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。

    请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。

    你可以假设 nums1 和 nums2 不会同时为空。
 * 示例 1:

    nums1 = [1, 3]
    nums2 = [2]

    则中位数是 2.0
 *
    示例 2:

    nums1 = [1, 2]
    nums2 = [3, 4]

    则中位数是 (2 + 3)/2 = 2.5

 * Class Solution
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $mergeArr = array_merge($nums1,$nums2);
        //采用归并排序
        $sort = $this->merge_sort($mergeArr);
        if (count($sort)%2 == 0){
            return ($sort[count($sort)/2]+$sort[count($sort)/2-1])/2;
        }else{
            return $sort[count($sort)/2];
        }
    }
    //归并排序
    function merge_sort($arr)
    {
          if(count($arr) <= 1){
             return $arr;
          }

         $left = array_slice($arr,0,(int)(count($arr)/2));
         $right = array_slice($arr,(int)(count($arr)/2));

         $left = $this->merge_sort($left);
         $right = $this->merge_sort($right);

         $output = $this->merge($left,$right);

         return $output;

    }


    function merge($left,$right)
    {
        $result = array();
        while(count($left) >0 && count($right) > 0)
        {
            if($left[0] <= $right[0]){
                array_push($result,array_shift($left));
            }else{
                array_push($result,array_shift($right));
            }
         }

         array_splice($result,count($result),0,$left);
         array_splice($result,count($result),0,$right);

         return $result;
        }
    }

$nums1 = [1,3];
$nums2 = [2,4];
$solution = new Solution();
$median = $solution->findMedianSortedArrays($nums1,$nums2);
var_dump($median);

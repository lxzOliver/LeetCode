<?php
// 给定一个包括 n 个整数的数组 nums 和 一个目标值 target。找出 nums 中的三个整数，使得它们的和与 target 最接近。返回这三个数的和。假定每组输入只存在唯一答案。

// 例如，给定数组 nums = [-1，2，1，-4], 和 target = 1.

// 与 target 最接近的三个数的和为 2. (-1 + 2 + 1 = 2).

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        $closest = 0;
        $threeSum = 0;
        for($i=0;$i<count($nums)-2;$i++){
            for($j=$i+1;$j<count($nums)-1;$j++){
                for($z=$i+2;$z<count($nums);$z++){
                    if($i == $j || $i == $z || $j == $z){
                        continue;
                    }
                    $sum = $nums[$i]+$nums[$j]+$nums[$z];
                    if($sum-$target == 0){
                        return $sum;
                    }
                    $difference = $target-$sum;
                    if($difference<0){
                        $difference = 0-$difference;
                    }
                    if($closest == 0){
                        $closest = $difference;
                        $threeSum = $sum;
                    }else if($difference < $closest){
                        $closest = $difference;
                        $threeSum = $sum;
                    }
                }
            }
        }
        return $threeSum;
    }
}
$nums = [-1,2,1,-4];
$target = 1;
$solution = new Solution;
$closest = $solution->threeSumClosest($nums,$target);
var_dump($closest);
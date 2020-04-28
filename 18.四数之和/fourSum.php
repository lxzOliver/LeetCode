<?php
// 给定一个包含 n 个整数的数组 nums 和一个目标值 target，判断 nums 中是否存在四个元素 a，b，c 和 d ，使得 a + b + c + d 的值与 target 相等？找出所有满足条件且不重复的四元组。

// 注意：

// 答案中不可以包含重复的四元组。

// 示例：

// 给定数组 nums = [1, 0, -1, 0, -2, 2]，和 target = 0。

// 满足要求的四元组集合为：
// [
//   [-1,  0, 0, 1],
//   [-2, -1, 1, 2],
//   [-2,  0, 0, 2]
// ]

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target) {
        $arr = [];
        for($i=0;$i<count($nums)-3;$i++){
            for($j=$i+1;$j<count($nums)-2;$j++){
                for($z=$i+2;$z<count($nums)-1;$z++){
                    for($k=$i+3;$k<count($nums);$k++){
                        if($nums[$i]+$nums[$j]+$nums[$z]+$nums[$k] == $target){
                            $coll = [$nums[$i],$nums[$j],$nums[$z],$nums[$k]];
                            $coll = $this->sort($coll);
                            if(!$arr){
                                $arr[] = $coll;
                            }else{
                                $is = true;
                                for($o=0;$o<count($arr);$o++){
                                    if($arr[$o] == $coll){
                                        $is = false;
                                    }
                                }

                                if($is){
                                    $arr[] = $coll;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $arr;
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
$nums = [1,0,-1,0,-2,2];
$target = 0;
$solution = new Solution();
$collection = $solution->fourSum($nums,$target);
var_dump($collection);
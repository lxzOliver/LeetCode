<?php
// 给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？请你找出所有满足条件且不重复的三元组。

// 注意：答案中不可以包含重复的三元组。

//  

// 示例：

// 给定数组 nums = [-1, 0, 1, 2, -1, -4]，

// 满足要求的三元组集合为：
// [
//   [-1, 0, 1],
//   [-1, -1, 2]
// ]

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $arr = [];
        for($i=0;$i<count($nums)-2;$i++){
            $one = $nums[$i];
            for($j=$i+1;$j<count($nums)-1;$j++){
                $two = $nums[$j];
                for($z=$i+2;$z<count($nums);$z++){
                    $three = $nums[$z];
                    if($one+$two+$three == 0){
                        $is = false;
                        if($one>$two){
                            $tmp = $one;
                            $one = $two;
                            $two = $tmp;
                        }
                        if($one>$three){
                            $tmp = $one;
                            $one = $three;
                            $three = $tmp;
                        }
                        if($two>$three){
                            $tmp = $two;
                            $two = $three;
                            $three = $tmp;
                        }
                        $item = [$one,$two,$three];
                        if($arr){
                            foreach ($arr as $k=>$v){
                                if($v == $item){
                                    $is = true;
                                }
                            }
                        }
                        if(!$is){
                            $arr[] = $item;
                        }

                    }
                }
            }
        }
        return $arr;
    }
}
$nums = [-1, 0, 1, 2, -1, -4];
$solution = new Solution();
$arr = $solution->threeSum($nums);
var_dump($arr);
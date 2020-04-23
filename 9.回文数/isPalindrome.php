<?php

// 判断一个整数是否是回文数。回文数是指正序（从左向右）和倒序（从右向左）读都是一样的整数。

// 示例 1:

// 输入: 121
// 输出: true
// 示例 2:

// 输入: -121
// 输出: false
// 解释: 从左向右读, 为 -121 。 从右向左读, 为 121- 。因此它不是一个回文数。
// 示例 3:

// 输入: 10
// 输出: false
// 解释: 从右向左读, 为 01 。因此它不是一个回文数。
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if($x<0){
            return false;
        }
        $x = (string)$x;
        if(strlen($x) == 1){
            return true;
        }
        //左边的值
        $left = '';
        //右边的值
        $right = '';
        if(strlen($x)%2 == 0){
            $half = strlen($x)/2;
            for($i=0;$i<$half;$i++){
                $left = $left.$x[$i];
            }
            for($i=strlen($x)-1;$i>=$half;$i--){
                $right = $right.$x[$i];
            }
        }else{
            $half = strlen($x)/2;
            for($i=0;$i<$half-1;$i++){
                $left = $left.$x[$i];
            }
            for($i=strlen($x)-1;$i>$half;$i--){
                $right = $right.$x[$i];
            }
        }
        if($left == $right){
            return true;
        }
        return false;
    }
}
$solution = new Solution();
$x = 121;
$isPalindrome = $solution->isPalindrome($x);
var_dump($isPalindrome);
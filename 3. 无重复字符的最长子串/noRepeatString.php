<?php

/**
 * Class Solution
 *给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
 *示例 1:

    输入: "abcabcbb"
    输出: 3
    解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
 * 示例 2:

    输入: "bbbbb"
    输出: 1
    解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
 *
 * 示例 3:

    输入: "pwwkew"
    输出: 3
    解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
         请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $maxLength = 0;
        for($i=0;$i<strlen($s)-1;$i++){
            $string = $s[$i];
            $num = 1;
            for($j=$i+1;$j<strlen($s);$j++){
                if (strpos($string,$s[$j]) !== false){
                    break;
                }else{
                    $string = $string.$s[$j];
                    $num++;
                }
            }
            if($maxLength<$num){
                $maxLength = $num;
            }
        }
        return $maxLength;
    }
}

$s = 'abcabcbb';

$solution = new Solution();
$max = $solution->lengthOfLongestSubstring($s);
var_dump($max);
<?php
class Solution {

    /**
     * 给定一个字符串 s，找到 s 中最长的回文子串。你可以假设 s 的最大长度为 1000。
     * 示例 1：
     *输入: "babad"
     *输出: "bab"
     *注意: "aba" 也是一个有效答案。
     *
     *示例 2：
     *输入: "cbbd"
     *输出: "bb"
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $num = 0;
        $maxPalindrome = '';
        for($i=0;$i<strlen($s)-1;$i++){
            $string = $s[$i];
            for($j=$i+1;$j<strlen($s);$j++){
                if ($string[0] != $s[$j]){
                    $string = $string.$s[$j];
                }else{
                    $string = $string.$s[$j];
                    if($num<strlen($string)){
                        $num = strlen($string);
                        $maxPalindrome = $string;
                    }
                    break;
                }
            }
        }
        return $maxPalindrome;
    }
}
$s = 'babad';
$solution = new Solution();
$palindrome = $solution->longestPalindrome($s);
var_dump($palindrome);

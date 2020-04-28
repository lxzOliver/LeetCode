<?php
// 编写一个函数来查找字符串数组中的最长公共前缀。

// 如果不存在公共前缀，返回空字符串 ""。

// 示例 1:

// 输入: ["flower","flow","flight"]
// 输出: "fl"
// 示例 2:

// 输入: ["dog","racecar","car"]
// 输出: ""
// 解释: 输入不存在公共前缀。

class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        if(count($strs)<1){
            return "";
        }
        if (count($strs) == 1){
            return $strs[0];
        }
        $prefix = "";
        for($i=0;$i<strlen($strs[0]);$i++){
            $contact = $strs[0][$i];
            for($j=1;$j<count($strs);$j++){
                if($contact != $strs[$j][$i]){
                    return $prefix;
                }
            }
            $prefix = $prefix.$contact;
        }
        return $prefix;
    }
}
$strs = ["flower","flow","flght"];
$solution = new Solution();
$prefix = $solution->longestCommonPrefix($strs);
var_dump($prefix);


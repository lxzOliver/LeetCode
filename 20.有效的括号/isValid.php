<?php
// 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。

// 有效字符串需满足：

// 左括号必须用相同类型的右括号闭合。
// 左括号必须以正确的顺序闭合。
// 注意空字符串可被认为是有效字符串。

// 示例 1:

// 输入: "()"
// 输出: true
// 示例 2:

// 输入: "()[]{}"
// 输出: true
// 示例 3:

// 输入: "(]"
// 输出: false
// 示例 4:

// 输入: "([)]"
// 输出: false
// 示例 5:

// 输入: "{[]}"
// 输出: true

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $parenthesesArr = [')'=>'(', '}'=>'{', ']'=>'['];
        $left = ['(','{','['];
        $arr = [];
        for($i=0;$i<strlen($s);$i++){
            if(in_array($s[$i],['(',')','{','}','[',']'])){
                $arr[] = $s[$i];
            }
        }
        if(!$arr){
            return true;
        }
        $needMatch = [];
        for($i=0;$i<count($arr);$i++){
            if($i == 0){
                if(in_array($arr[$i],$left)){
                    array_unshift($needMatch,$arr[$i]);
                }else{
                    return false;
                }
            }else{
                if(in_array($arr[$i],$left)){
                    array_unshift($needMatch,$arr[$i]);
                }else{
                    if(isset($needMatch[0]) && $parenthesesArr[$arr[$i]] == $needMatch[0]){
                        array_shift($needMatch);
                    }else{
                        return false;
                    }
                }
            }
        }
        if(!$needMatch){
            return true;
        }
        return false;

    }
}
$s = '()';
$solution = new Solution();
$isValid = $solution->isValid($s);
var_dump($isValid);
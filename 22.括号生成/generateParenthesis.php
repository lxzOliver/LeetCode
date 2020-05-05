<?php
// 数字 n 代表生成括号的对数，请你设计一个函数，用于能够生成所有可能的并且 有效的 括号组合。

//  

// 示例：

// 输入：n = 3
// 输出：[
//        "((()))",
//        "(()())",
//        "(())()",
//        "()(())",
//        "()()()"
//      ]


class Solution {

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $length = $n*2;
        $parentheses = ['(',')'];
        $arr = [];
        for($i=0;$i<$length;$i++){
            $arr[] = $parentheses;
        }
        $all = $this->recursiveArray($arr);
        $parenthesisArr = [];
        foreach ($all as $k=>$v){
            if ($this->isValid($v)){
                $parenthesisArr[] = $v;
            }
        }
        return $parenthesisArr;
    }

    function recursiveArray($arr,$i=0,$data=[]){
        $j=$i+1;
        if(count($arr)==1){
            return $arr;
        }else{
            if($j>=count($arr)){
                return $data;
            }
            if(!$data){
                foreach($arr[$i] as $k1=>$v1){
                    foreach($arr[$j] as $k2=>$v2){
                        $data[]=$v1.$v2;
                    }
                }
                $i++;
                return $this->recursiveArray($arr,$i,$data);
            }else{
                $new = [];
                foreach($data as $k1=>$v1){
                    foreach($arr[$j] as $k2=>$v2){
                        $new[]=$v1.$v2;
                    }
                }
                $data = $new;
                $i++;
                return $this->recursiveArray($arr,$i,$data);
            }
        }
    }

    function isValid($s) {
        $parenthesesArr = [')'=>'(', '}'=>'{', ']'=>'['];
        $left = ['(','{','['];
        $right = [')','}',']'];
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
            if(in_array($arr[0],$right)){
                return false;
            }
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
$n = 3;
$solution = new Solution();
$arr = $solution->generateParenthesis($n);
var_dump($arr);
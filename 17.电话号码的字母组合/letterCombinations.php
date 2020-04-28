<?php
// 给定一个仅包含数字 2-9 的字符串，返回所有它能表示的字母组合。

// 给出数字到字母的映射如下（与电话按键相同）。注意 1 不对应任何字母。



// 示例:

// 输入："23"
// 输出：["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"].
// 说明:
// 尽管上面的答案是按字典序排列的，但是你可以任意选择答案输出的顺序。


class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        $dictionary = [
            '2'=>['a','b','c'],
            '3'=>['d','e','f'],
            '4'=>['g','h','i'],
            '5'=>['j','k','l'],
            '6'=>['m','n','o'],
            '7'=>['p','q','r','s'],
            '8'=>['t','u','v'],
            '9'=>['w','x','y','z']
        ];
        $arr = [];
        for($i=0;$i<strlen($digits);$i++){
            if(isset($dictionary[$digits[$i]])){
                $arr[] = $dictionary[$digits[$i]];
            }
        }
        return $this->recursiveArray($arr);
    }

    function recursiveArray($arr,$i=0,$data=[]){
        $j=$i+1;
        if(count($arr)==1){
            return $arr;
        }else{
            if($j>=count($arr)){
                return $data;
            }
            $z=0;
            foreach($arr[$i] as $k1=>$v1){
                foreach($arr[$j] as $k2=>$v2){
                    $data[$z]=$v1.$v2;
                    $z++;
                }
            }
            $i++;
            return $this->recursiveArray($arr,$i,$data);
        }

    }
}
$digits = "23";
$solution = new Solution();
$combine = $solution->letterCombinations($digits);
var_dump($combine);
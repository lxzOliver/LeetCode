<?php
class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        if(!$needle){
            return 0;
        }
        for($i=0;$i<strlen($needle);$i++){
            $str = $needle[$i];
            $thisStr = '';
            for($j=0;$j<strlen($haystack);$j++){
                if($thisStr){
                    $thisStr = $thisStr.$haystack[$j];
                }else{
                    $thisStr = $haystack[$j];
                    $find = $j;
                }

                if($thisStr == $str){
                    if($thisStr == $needle){
                        return $find;
                    }
                    $i++;
                    if(isset($needle[$i])){
                        $str = $str.$needle[$i];
                    }else{
                        $thisStr = '';
                        $find = 0;
                    }

                }else{
                    $thisStr = '';
                    $find = 0;
                }
            }
        }
        return -1;
    }
}
$haystack = 'hello';
$neddle = 'll';
$solution = new Solution();
$find = $solution->strStr($haystack,$neddle);
var_dump($find);
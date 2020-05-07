<?php
class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        if($divisor == 0){
            return 0;
        }
        $isPositive = true;
        if(($divisor < 0 || $dividend < 0) && !($dividend<0 && $divisor<0)){
            $isPositive = false;
        }
        $dividend = abs($dividend);
        $divisor = abs($divisor);
        $count = 0;
        while ($dividend > $divisor){
            $dividend = $dividend-$divisor;
            $count++;
        }
        if(!$isPositive){
            return '-'.$count;
        }
        return $count;
    }
}
$solution = new Solution();
$dividend = 10;
$divisor = 3;
$data = $solution->divide($dividend,$divisor);
var_dump($data);
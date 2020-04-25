<?php
// 给你 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0)。找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。

// 说明：你不能倾斜容器，且 n 的值至少为 2。
//图中垂直线代表输入数组 [1,8,6,2,5,4,8,3,7]。在此情况下，容器能够容纳水（表示为蓝色部分）的最大值为 49。




class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        if(count($height)<2){
            return 0;
        }
        $max = 0;
        for($i=0;$i<count($height)-1;$i++){
            for($j=0;$j<count($height);$j++){
                $minHigh = 0;
                if($height[$i]>=$height[$j]){
                    $minHigh = $height[$j];
                }else{
                    $minHigh = $height[$i];
                }
                $width = $j-$i;
                $area = $minHigh*$width;
                if($area>$max){
                    $max = $area;
                }
            }
        }
        return $max;
    }
}
$height = [1,8,6,2,5,4,8,3,7];
$solution = new Solution();
$maxArea = $solution->maxArea($height);
var_dump($maxArea);
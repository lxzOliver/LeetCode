<?php
class Solution {

    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
     */
    function findSubstring($s, $words) {
        //获得索引下标的排列组合
        $getNum = $this->getRandomNum(count($words),0,[]);
        $numCount = count($getNum);
        //去除出现重复数字
        for($i=0;$i<count($words);$i++){
            for($j=0;$j<$numCount;$j++){
                if(isset($getNum[$j])){
                    $strCount = substr_count($getNum[$j],$i);
                    if($strCount > 1){
                        unset($getNum[$j]);
                    }
                }
            }
        }
        $i=0;
        $new = [];
        foreach ($getNum as $k=>$v){
            $new[$i] = $v;
            $i++;
        }
        //得到串联的字符串
        $seriesArr = [];
        for($i=0;$i<count($new);$i++){
            for($j=0;$j<strlen($new[$i]);$j++){
                if(isset($seriesArr[$i])){
                    $seriesArr[$i] = $seriesArr[$i].$words[$new[$i][$j]];
                }else{
                    $seriesArr[$i] = $words[$new[$i][$j]];
                }

            }
        }
        $new = array_unique($seriesArr);
        $seriesArr = [];
        $i=0;
        foreach ($new as $k=>$v){
            $seriesArr[$i] = $v;
            $i++;
        }
        $findArr = [];
        for($i=0;$i<count($seriesArr);$i++){
            $find = strpos($s,$seriesArr[$i]);
            if ($find !== false){
                $findArr[] = $find;
            }
        }
        return $findArr;
    }

    function getRandomNum($count,$i,$arr){

        if($i>=$count){
            return $arr;
        }
        if(!$arr){
            for($j=0;$j<$count;$j++){
                $arr[] = $j;
            }
            $i++;
            return $this->getRandomNum($count,$i,$arr);
        }else{
            $new = [];
            for($j=0;$j<count($arr);$j++){
                for($z=0;$z<$count;$z++){
                    $new[] = $arr[$j].$z;
                }
            }
            $arr = $new;
            $i++;
            return $this->getRandomNum($count,$i,$arr);
        }
    }
}
$solution = new Solution();
$s = 'barfoothefoobarman';
$words = ['foo','bar'];
$arr = $solution->findSubstring($s,$words);
var_dump($arr);
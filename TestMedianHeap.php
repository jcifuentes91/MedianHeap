<?php
include 'MedianHeap.php';

class TestMedianHeap{

    protected $arrays = array();
    protected $medianHeap;

    public function __construct()
    {
        $this->medianHeap = new MedianHeap();
        $arrayCount = mt_rand(40,50);
        for($i=0;$i<$arrayCount;$i++){
            $newArray = range(-9999, 9999);
            shuffle($newArray );
            $randonLength = mt_rand(40,50);
            $newArray = array_slice($newArray ,0,$randonLength);
            $this->arrays[] = $newArray;
            //print_r($newArray);
        }
    }

    public function test(){
        //median array
        $arrayLength = count($this->arrays);
        //start timer
        $medianArrayTimer = microtime(true); 
        for($i=0;$i<$arrayLength;$i++){
            $currentArray = $this->arrays[$i];
            $median = $this->medianHeap->median_array($currentArray,true);
            //echo $median."\r\n";
        }
        //end timer
        echo 'ARRAYS: '.count($this->arrays)."\r\n";
        $medianArrayTime = (microtime(true) - $medianArrayTimer);
        echo 'MEDIAN ARRAY TIME: '.$medianArrayTime."\r\n";
        //median heap
        $medianHeapTimer = microtime(true);
        for($i=0;$i<$arrayLength;$i++){
            $currentArray = $this->arrays[$i];
            $median = $this->medianHeap->median_heap($currentArray,true);
            //echo $median."\r\n";
        }
        $medianHeapTime = (microtime(true) - $medianHeapTimer);
        echo 'MEDIAN HEAP TIME: '.$medianHeapTime;
        return ['heap'=>$medianHeapTime,'array'=> $medianArrayTime];
    }
}

$_test = new TestMedianHeap();
$_test->test();
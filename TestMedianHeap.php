<?php
include 'MedianHeap.php';

class TestMedianHeap{

    protected $arrays = array();
    protected $medianHeap;

    public function __construct()
    {
        $this->medianHeap = new MedianHeap();
        for($i=0;$i<50;$i++){
            $newArray = range(-9999, 9999);
            shuffle($newArray );
            $newArray = array_slice($newArray ,0,50);
            $this->arrays[] = $newArray;
        }
    }

    public function testArray(){
        //median array
        $arrayLength = count($this->arrays);
        //start timer
        $medianArrayTimer = microtime(true); 
        for($i=0;$i<$arrayLength;$i++){
            $currentArray = $this->arrays[$i];
            $median = $this->medianHeap->median_array($currentArray);
        }
        //end timer
        echo 'ARRAYS: '.$arrayLength."\r\n";
        $medianArrayTime = (microtime(true) - $medianArrayTimer);
        echo 'MEDIAN ARRAY TIME: '.$medianArrayTime."\r\n";
    }

    public function testHeap(){
        $arrayLength = count($this->arrays);
        echo 'ARRAYS: '.$arrayLength."\r\n";
        //median heap
        $medianHeapTimer = microtime(true);
        for($i=0;$i<$arrayLength;$i++){
            $currentArray = $this->arrays[$i];
            $median = $this->medianHeap->median_heap($currentArray);
        }
        $medianHeapTime = (microtime(true) - $medianHeapTimer);
        echo 'MEDIAN HEAP TIME: '.$medianHeapTime."\r\n";;
    }
}

$_test = new TestMedianHeap();
$_test->testArray();
$_test->testHeap();
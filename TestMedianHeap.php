<?php
include 'MedianHeap.php';

class TestMedianHeap{

    protected $arrays = array();
    protected $medianHeap;

    public function __construct()
    {
        //create the Median Heap Object
        $this->medianHeap = new MedianHeap();
        //generate 50 arrays
        for($i=0;$i<50;$i++){
            //generate an array between -9999 and 9999
            $newArray = range(-9999, 9999);
            //shuffle the array to have different order on the array
            shuffle($newArray );
            //take 50 elements from the array
            $newArray = array_slice($newArray ,0,50);
            //add the array to the array list
            $this->arrays[] = $newArray;
        }
    }

    public function testArray(){
        //calculate the array length
        $arrayLength = count($this->arrays);
        //get the timestamp from the start
        $medianArrayTimer = microtime(true); 
        //for each array on the list calculate the median using the Quick Sort Sorting
        for($i=0;$i<$arrayLength;$i++){
            $currentArray = $this->arrays[$i];
            $median = $this->medianHeap->median_array($currentArray);
        }
        //get the timestamp from the end and subtract them to get the time it took to solve the 50 arrays
        $medianArrayTime = (microtime(true) - $medianArrayTimer);
        echo 'MEDIAN ARRAY TIME: '.$medianArrayTime."\r\n";
    }

    public function testHeap(){
         //calculate the array length
        $arrayLength = count($this->arrays);
         //get the timestamp from the start
        $medianHeapTimer = microtime(true);
        //for each array on the list calculate the median using the Heap Sort Sorting
        for($i=0;$i<$arrayLength;$i++){
            $currentArray = $this->arrays[$i];
            $median = $this->medianHeap->median_heap($currentArray);
        }
        //get the timestamp from the end and subtract them to get the time it took to solve the 50 arrays
        $medianHeapTime = (microtime(true) - $medianHeapTimer);
        echo 'MEDIAN HEAP TIME: '.$medianHeapTime."\r\n";;
    }
}

//Instantiate a Test Object
$_test = new TestMedianHeap();
$_test->testArray();//If executing the Heap Sort Sorting, comment this line
$_test->testHeap();//If executing the Quick Sort Sorting, comment this line
<?php
class MedianHeap {


    public function median_array($array){
        $array = $this->quickSort($array,count($array));
        return $this->calculateMedian($array);
    }

    public function median_heap($array){
        $array =  $this->heapSort($array);
        return $this->calculateMedian($array);
    }


    function calculateMedian($arr) {
        //find the length of the array
        $count = count($arr); 
        //find the middle value
        $middleval = floor(($count-1)/2); 
        //length is an odd number, middle is the median
        if($count % 2) { 
            $median = $arr[$middleval];
        } else {
            // length is an even number, calculate avg of 2 medians 
            $low = $arr[$middleval];
            $high = $arr[$middleval+1];
            $median = (($low+$high)/2);
        }
        return $median;
    }
    
    public function quickSort($array){
        // find array size
        $length = count($array);
        // base case test, if array of length 0 then just return array to caller
        if($length <= 1){
            return $array;
        }else{
            // select an item to act as our pivot point, since list is unsorted first position is easiest
            $pivot = $array[0];
            // declare our two arrays to act as partitions
            $left = $right = array();
            // loop and compare each item in the array to the pivot value, place item in appropriate partition
            for($i = 1; $i < count($array); $i++)
            {
                if($array[$i] < $pivot){
                    $left[] = $array[$i];
                }
                else{
                    $right[] = $array[$i];
                }
            }
            // use recursion to now sort the left and right lists
            return array_merge($this->quickSort($left), array($pivot), $this->quickSort($right));
        }
    }



    private function MaxHeapify(&$data, $heapSize, $index) {
        $left = ($index + 1) * 2 - 1;
        $right = ($index + 1) * 2;
        $largest = 0;
    
        if ($left < $heapSize && $data[$left] > $data[$index])
            $largest = $left;
        else
            $largest = $index;
    
        if ($right < $heapSize && $data[$right] > $data[$largest])
            $largest = $right;
    
        if ($largest != $index)
        {
            $temp = $data[$index];
            $data[$index] = $data[$largest];
            $data[$largest] = $temp;
    
            $this->MaxHeapify($data, $heapSize, $largest);
        }
    }
    
    private function heapSort($data) {
        $count = count($data);
        $heapSize = $count;
        for ($p = ($heapSize - 1) / 2; $p >= 0; $p--)
            $this->MaxHeapify($data, $heapSize, $p);
    
        for ($i = $count - 1; $i > 0; $i--)
        {
            $temp = $data[$i];
            $data[$i] = $data[0];
            $data[0] = $temp;
    
            $heapSize--;
            $this->MaxHeapify($data, $heapSize, 0);
        }
        return $data;
    }
}
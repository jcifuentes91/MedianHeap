# MedianHeap
PHP does not have a built in function for calculating the median of an array. Write an implementation of a “MedianHeap” class that takes an array of numbers and can output it’s median. Also write a simple array_median() function that does not utilize heap strategies. Please benchmark the 2 solutions and determine which is faster. Please give a brief explanation on why you believe the faster implementation is faster.
## How to run it
- Clone the repo
- If running the Quick Sort test comment line [60](https://github.com/jcifuentes91/MedianHeap/blob/master/TestMedianHeap.php#L60)
- If running the Heap Sort test comment line [59](https://github.com/jcifuentes91/MedianHeap/blob/master/TestMedianHeap.php#L59)
- Run ```php TestMedianHeap.php```
## Results
I ran the two tests separately, each test consists on building 50 arrays with 50 random numbers between -999 and 999, then sorting each of the 50 arrays and calculating the Median. The tests were ran ten times each and took out the highest and the lowest times, then made an average, and this are the results:

![Averages](https://i.imgur.com/ge9jZnEl.png)

## Quick Sort
![Quick Sort](https://i.imgur.com/OGSpdPA.png)

## Heap Sort
![Heap Sort](https://i.imgur.com/AVNoard.png)

## Conclusion
### Heapsort:
Best\Worst-case performance: O(n log n)

### Quicksort:
Worst-case performance	O(n^2)
Best-case performance	O(n log n) 

Based on this we can see that Heap Sort sorting performance is better, because It has always the same performance, and this average performance is better than the worst case performance of Quick Sort. This average is reflected on the tests and on the graphs.

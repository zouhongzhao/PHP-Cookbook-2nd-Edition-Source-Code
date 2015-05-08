// find the "average" of a group of numbers
function mean() {
    // initialize to avoid warnings
    $sum = 0;

    // load the arguments into $numbers
    $numbers = func_get_args();

    // the number of elements in the array
    $size = count($numbers);

    // iterate through the array and add up the numbers
    for ($i = 0; $i < $size; $i++) {
        $sum += $numbers[$i];
    }

    // divide by the amount of numbers
    $average = $sum / $size;

    // return average
    return $average;
}

$mean = mean(96, 93, 97);
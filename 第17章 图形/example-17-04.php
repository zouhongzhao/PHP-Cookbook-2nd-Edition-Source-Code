function pc_bar_chart($question, $answers) {

    // define colors to draw the bars
    $colors = array(array(255,102,0), array(0,153,0),
                    array(51,51,204), array(255,0,51),
                    array(255,255,0), array(102,255,255), 
                    array(153,0,204));

    $total = array_sum($answers['votes']);
    
    // define some spacing values and other magic numbers
    $padding = 5;
    $line_width = 20;
    $scale = $line_width * 7.5;
    $bar_height = 10;

    $x = $y = $padding;

    // allocate a large palette for drawing, since you don't know
    // the image length ahead of time
    $image = ImageCreate(150, 500);
    $bg_color = ImageColorAllocate($image, 224, 224, 224);
    $black = ImageColorAllocate($image, 0, 0, 0);

    // print the question
    $wrapped = explode("\n", wordwrap($question, $line_width));
    foreach ($wrapped as $line) {
        ImageString($image, 3, $x, $y , $line, $black);
        $y += 12;
    }

    $y += $padding;

    // print the answers
    for ($i = 0; $i < count($answers['answer']); $i++) { 

        // format percentage
        $percent = sprintf('%1.1f', 100*$answers['votes'][$i]/$total);
        $bar = sprintf('%d', $scale*$answers['votes'][$i]/$total);

        // grab color
        $c = $i % count($colors); // handle cases with more bars than colors
        $text_color = ImageColorAllocate($image, $colors[$c][0], 
                                 $colors[$c][1], $colors[$c][2]);

        // draw bar and percentage numbers
        ImageFilledRectangle($image, $x, $y, $x + $bar,
                             $y + $bar_height, $text_color);
        ImageString($image, 3, $x + $bar + $padding, $y, 
                    "$percent%", $black);

         $y += 12;

         // print answer
         $wrapped = explode("\n", wordwrap($answers['answer'][$i], $line_width));
         foreach ($wrapped as $line) {
             ImageString($image, 2, $x, $y, $line, $black);
             $y += 12;
         }

         $y += 7;
     }

     // crop image by copying it
     $chart = ImageCreate(150, $y);
     ImageCopy($chart, $image, 0, 0, 0, 0, 150, $y);

     // deliver image
     header ('Content-type: image/png');
     ImagePNG($chart);

     // clean up
     ImageDestroy($image);
     ImageDestroy($chart);
}
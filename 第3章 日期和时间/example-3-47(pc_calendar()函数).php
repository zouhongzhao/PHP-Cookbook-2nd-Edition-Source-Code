<?php
function pc_calendar($month,$year,$opts = '') {
    // set default options
    if (! is_array($opts)) { $opts = array(); }
    if (! isset($opts['id'])) { $opts['id'] = 'calendar'; }
    if (! isset($opts['month_link'])) {
        $opts['month_link'] = 
            '<a href="'.$_SERVER['PHP_SELF'].'?month=%d&amp;year=%d">%s</a>';
    }
    $classes = array();
    foreach (array('prev','month','next','weekday','blank','day','today') as $class) {
        if (isset($opts[$class.'_class'])) {
            $classes[$class] = htmlentities($opts[$class.'_class']);
        } else {
            $classes[$class] = $class;
        }
    }
    
    list($this_month,$this_year,$this_day) = split(',',strftime('%m,%Y,%d'));
    $day_highlight = (($this_month == $month) && ($this_year == $year));
    
    list($prev_month,$prev_year) = 
        split(',',strftime('%m,%Y',mktime(0,0,0,$month-1,1,$year)));
    $prev_month_link = sprintf($opts['month_link'],$prev_month,$prev_year,'&laquo;');
    
    list($next_month,$next_year) = 
        split(',',strftime('%m,%Y',mktime(0,0,0,$month+1,1,$year)));
    $next_month_link = sprintf($opts['month_link'],$next_month,$next_year,'&raquo;');
    
?>
<table id="<?php echo htmlentities($opts['id']) ?>">
        <tr>
                <td class="<?php echo $classes['prev'] ?>">
                        <?php print $prev_month_link ?>
                </td>
                <td class="<?php echo $classes['month'] ?>" colspan="5">
                <?php print strftime('%B %Y',mktime(0,0,0,$month,1,$year)); ?>
                </td>
                <td class="<?php echo $classes['next'] ?>">
                        <?php print $next_month_link ?>
                </td>
        </tr>
<?php
    $totaldays = date('t',mktime(0,0,0,$month,1,$year));
 
    // print out days of the week
    print '<tr>';
    $weekdays = array('Su','Mo','Tu','We','Th','Fr','Sa');
    while (list($k,$v) = each($weekdays)) {
        print '<td class="'.$classes['weekday'].'">'.$v.'</td>';
    }
    print '</tr><tr>';
    // align the first day of the month with the right week day
    $day_offset = date("w",mktime(0, 0, 0, $month, 1, $year));
    if ($day_offset > 0) { 
        for ($i = 0; $i < $day_offset; $i++) { 
            print '<td class="'.$classes['blank'].'">&nbsp;</td>';
        }
    }
    $yesterday = time() - 86400; 

    // print out the days
    for ($day = 1; $day <= $totaldays; $day++) {
        $day_secs = mktime(0,0,0,$month,$day,$year);
        if ($day_secs >= $yesterday) {  
            if ($day_highlight && ($day == $this_day)) {
                print '<td class="' . $classes['today'] .'">' . $day . '</td>';
            } else {
                print '<td class="' . $classes['day'] .'">' . $day . '</td>';
            }
        } else {
            print '<td class="' . $classes['day'] .'">' . $day .'</td>';
        }
        $day_offset++;

        // start a new row each week // 
        if ($day_offset == 7) {
            $day_offset = 0;
            if ($day < $totaldays) { print "</tr>\n<tr>"; }
        }
    }
    // fill in the last week with blanks //
    if ($day_offset > 0) { $day_offset = 7 - $day_offset; }
    if ($day_offset > 0) { 
        for ($i = 0; $i < $day_offset; $i++) { 
            print '<td class="'.$classes['blank'].'">&nbsp;</td>';
        }
    }
    print '</tr></table>';
}
?>
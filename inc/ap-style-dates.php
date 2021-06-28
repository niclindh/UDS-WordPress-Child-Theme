<?php

// AP Style dates for posts
// v 0.1 Nic Lindh June 28, 2021
//
// Uses the post date and expects to be called with 
// apstyle_post_date(get_the_date('l'), get_the_date('j'), get_the_date('m'), get_the_date('Y'));
//
// Easier to get the pieces in the call than to explode a time object

if (!function_exists('apstyle_post_date')) {
    function apstyle_post_date($post_day, $post_daynum, $post_month, $post_year)
    {

        // drop leading zero on the day
        if (substr($post_daynum, 0, 1) == '0') {
            $post_daynum = substr($day, 1, 1);
        }

        // format months according to arcance rules
        switch ($post_month) {
            case '01':
                $post_month = 'Jan. ';
                break;
            case '02':
                $post_month = 'Feb. ';
                break;
            case '03':
                $post_month = 'March ';
                break;
            case '04':
                $post_month = 'April ';
                break;
            case '05':
                $post_month = 'May ';
                break;
            case '06':
                $post_month = 'June ';
                break;
            case '07':
                $post_month = 'July ';
                break;
            case '08':
                $post_month = 'Aug. ';
                break;
            case '09':
                $post_month = 'Sept. ';
                break;
            case '10':
                $post_month = 'Oct. ';
                break;
            case '11':
                $post_month = 'Nov. ';
                break;
            case '12':
                $post_month = 'Dec. ';
                break;
        }

        $currentyear = date("Y");

        // dont't print the year if same as current
        if ($currentyear == $post_year) {
            $apstyle = $post_day . ', ' . $post_month . ' ' . $post_daynum;
        } else {
            $apstyle = $post_day . ', ' . $post_month . ' ' . $post_daynum . ', ' . $post_year;
        }

        return $apstyle;
    }
}
// Formats events dates and times according to AP Style
// 
// v 0.9 Nic Lindh June 22, 2022
//
// Excepcts to be called with three variables: start date-time, end date-time and a boolean for if the end time will be shown
// Excpect date times in the default ACF format d/m/Y g:i a
//
// Returns a string with the AP Style representation of the dates and times

if (!function_exists('apstyle_event_date')) {
    function apstyle_event_date($event_start, $event_end, $show_end_date)
    {

        $event_start_date = apstyle_generate_hour($event_start);
        if ($show_end_date) {
            $event_end_date = apstyle_generate_hour($event_end);
        }

        // Get the times and string offsets
        $start_pm = strpos($event_start_date['time'], 'p.m.');
        $end_pm = strpos($event_end_date['time'], 'p.m.');
        $start_am = strpos($event_start_date['time'], 'a.m.');
        $end_am = strpos($event_end_date['time'], 'a.m.');

        // if end time is not shown
        if (!$show_end_date) {
            $event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ' at ' . $event_start_date['time'];
        }

        // if end time is shown
        if ($show_end_date) {

            // event runs over seveeral days
            if ($event_start_date['date'] != $event_end_date['date']) {
                if ($event_start_date['time'] == '12 a.m.') {
                    $event_start_date['time'] = "Midnight";
                }
                $event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ' at ' . $event_start_date['time'] . ' to ' . $event_end_date['weekday'] . ', ' . $event_end_date['date'] . ' at ' . $event_end_date['time'];
            }

            // p.m. event
            elseif ($start_pm !== false && $end_pm !== false) {
                if ($event_start_date['time'] == '12 p.m.') {
                    $start_it = 'Noon';
                } else {
                    $start_it = substr($event_start_date['time'], 0, ($start_pm - 1));
                }
                $event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ', ' . $start_it . ' - ' . $event_end_date['time'];
            }

            // a.m. event
            elseif ($start_am !== false && $end_am !== false) {
                if ($event_start_date['time'] == '12 a.m.') {
                    $event_start_date['time'] = "Midnight";
                }
                $event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ', ' . substr($event_start_date['time'], 0, ($start_am - 1)) . ' - ' . $event_end_date['time'];
            } elseif ($start_am !== false && $end_pm !== false) {
                if ($event_start_date['time'] == '12 a.m.') {
                    $event_start_date['time'] = "Midnight";
                }
                $event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ', ' . $event_start_date['time'] . ' - ' . $event_end_date['time'];
            }
        }
        return $event_time;
    }
}


if (!function_exists('apstyle_generate_hour')) {
    function apstyle_generate_hour($event_date)
    {
        $day_of_week = DateTime::createFromFormat('d/m/Y g:i a', $event_date)->format('l');

        $day = substr($event_date, 0, 2);
        $month = substr($event_date, 3, 2);
        $year = substr($event_date, 6, 4);
        $hour = substr($event_date, 11, 8);

        // drop leading zero on the day
        if (substr($day, 0, 1) == '0') {
            $day = substr($day, 1, 1);
        }

        // use a.m. and p.m. like civilized humans
        $hour = str_replace('pm', 'p.m.', $hour);
        $hour = str_replace('am', 'a.m.', $hour);

        // strip :00 from hours
        $hour = str_replace(':00', '', $hour);

        switch ($month) {
            case '01':
                $month = 'Jan. ';
                break;
            case '02':
                $month = 'Feb. ';
                break;
            case '03':
                $month = 'March ';
                break;
            case '04':
                $month = 'April ';
                break;
            case '05':
                $month = 'May ';
                break;
            case '06':
                $month = 'June ';
                break;
            case '07':
                $month = 'July ';
                break;
            case '08':
                $month = 'Aug. ';
                break;
            case '09':
                $month = 'Sept. ';
                break;
            case '10':
                $month = 'Oct. ';
                break;
            case '11':
                $month = 'Nov. ';
                break;
            case '12':
                $month = 'Dec. ';
                break;
        }

        $currentyear = date("Y");

        // dont't print the year if same as current
        if ($currentyear == $year) {
            $year = '';
        }

        // only print year if different than current year
        if ($year) {
            $event_formatted = $month . ' ' . $day . ', ' . $year;
        } else {
            $event_formatted = $month . ' ' . $day;
        }

        return $the_event = array(
            'date' => $event_formatted,
            'time' => $hour,
            'weekday' => $day_of_week
        );
    }
}

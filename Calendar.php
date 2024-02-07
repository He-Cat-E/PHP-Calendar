<?php
class Calendar {

    private $active_year, $active_month, $active_day;
    private $events = [];

    public function __construct($date = null) {
        $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
        $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
        $this->active_day = $date != null ? date('d', strtotime($date)-1) : date('d');
    }

    public function add_event($txt, $date, $days = 1, $color = '') {
        $color = $color ? ' ' . $color : $color;
        $this->events[] = [$txt, $date, $days, $color];
    }

    public function __toString() {
        $num_days = date('t', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year));
        $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year)));
        $days = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];
        $months = [0 => 'Jan', 1 => 'Feb', 2 => 'Mar', 3 => 'Apr', 4 => 'May', 5 => 'Jun', 6 => 'Jul',7 => 'Aug', 8 => 'Sep', 9 => 'Oct', 10 => 'Nov', 11 => 'Dec'];
        $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);
        $html = '<div class="calendar">';
        $html .= '<div class="header">';
        $html .= '<div class="month-year">';
        $html .= date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day));
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="days">';
        for($i = 0; $i < 6; $i++){
            $date=date_create();
            date_date_set($date,$this->active_year,$this->active_month,intval($this->active_day)+1);
            $custom_date = date_format($date,"Y-m-d");
            $this->active_year = date('Y', strtotime($custom_date));
            $this->active_month = date('m', strtotime($custom_date));
            $this->active_day = date('d', strtotime($custom_date));
            $html .='
                <div class = "day_name">
                    ' . ($i == 0 || $i == 5 ? "<button type='submit' class='btn btn-default " . ($i == 0 ? 'prev-week' : 'next-week') . "'" . ($i == 0 ? "onclick='clickButton(-1)'" : "onclick='clickButton(1)'") . "><i class = '" . ($i == 0 ? 'fas fa-arrow-left' : 'fas fa-arrow-right') . "'></i></button>" : " ") . '
                    ' . $days[date('w', strtotime($custom_date))] . '</br>
                    ' . ($this->active_day."  ".$months[intval($this->active_month)-1]) .'
                </div>
            ';  
        }
        // echo $this->active_year.$this->active_month.$this->active_day;
        // for ($i = $first_day_of_week; $i > 0; $i--) {
        //     $html .= '
        //         <div class="day_num ignore">
        //             ' . ($num_days_last_month-$i+1) . '
        //         </div>
        //     ';
        // }
        for ($i = 1; $i <= $num_days; $i++) {
            $selected = '';
            if ($i == $this->active_day) {
                $selected = ' selected';
            }
            $html .= '<div class="day_num' . $selected . '">';
            $html .= '<span>' . $i . '</span>';
            foreach ($this->events as $event) {
                for ($d = 0; $d <= ($event[2]-1); $d++) {
                    if (date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[1]))) {
                        $html .= '<div class="event' . $event[3] . '">';
                        $html .= $event[0];
                        $html .= '</div>';
                    }
                }
            }
            $html .= '</div>';
        }
        for ($i = 1; $i <= (42-$num_days-max($first_day_of_week, 0)); $i++) {
            $html .= '
                <div class="day_num ignore">
                    ' . $i . '
                </div>
            ';
        }
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

}
?>
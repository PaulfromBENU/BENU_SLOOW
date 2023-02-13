<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\Opening;
use App\Models\Reservation;

class Datepicker extends Component
{
    public $current_date;
    public $selected_day;
    public $selected_month;
    public $selected_year;
    public $selected_date;
    public $days_by_month;
    public $max_year;
    public $days_with_info;
    public $opening_id;
    public $opening;
    public $opening_seats;
    public $show_selector;

    public function mount()
    {
        $this->current_date = Carbon::now()->format('d\/m\/Y');

        $this->selected_day = Carbon::now()->format('d');
        $this->selected_month = intval(Carbon::now()->format('m'));
        $this->selected_year = Carbon::now()->format('Y');

        $this->computeCalendarDates();

        $this->show_selector = 0;

        $this->days_by_month = [];
        $this->days_with_info = [];

        $latest_opening = Opening::orderBy('date', 'desc')->first();
        $this->max_year = max('2023', Carbon::parse($latest_opening->date)->format('Y'));
    }

    public function computeCalendarDates()
    {
        $leap_year = 0;
        if (fmod($this->selected_year, 4) == 0) {
            $leap_year = 1;
        }

        $this->days_by_month = [
            '1' => 31,
            '2' => 28 + $leap_year,
            '3' => 31,
            '4' => 30,
            '5' => 31,
            '6' => 30,
            '7' => 31,
            '8' => 31,
            '9' => 30,
            '10' => 31,
            '11' => 30,
            '12' => 31
        ];

        // Max 43
        $this->days_with_info = [];

        // Compute which weekday is the first of the month
        $first_day = Carbon::parse('01-'.str_pad($this->selected_month, 2, 0, STR_PAD_LEFT).'-'.$this->selected_year)->dayOfWeek;

        // Used to start the week on Monday instead of Sunday, as provided by Carbon
        $days_equivalence = [
            0 => 6,
            1 => 0,
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 4,
            6 => 5,
        ];

        for ($i=0; $i < $days_equivalence[$first_day]; $i++) { 
            $this->days_with_info[$i] = null;
        }

        $opening_date_string = $this->selected_year.'-'.str_pad($this->selected_month, 2, 0, STR_PAD_LEFT).'-01 00:00:00';
        $with_opening = 0; //FERME

        if (Opening::where('date', $opening_date_string)->count() > 0) {
            $with_opening = 1; //OUVERT
/*
            $this->opening = Opening::where('date', $opening_date_string)->first();
            $this->opening_id = $this->opening->id;
            $this->opening_seats = $this->opening->seats;
            if (Reservation::where('opening_id', $this->opening_id)->sum('seats') >= $this->opening_seats) {
                $with_opening = 2; //FULL
            }
            */
        }
        

        $this->days_with_info[$days_equivalence[$first_day]] = [
            "day" => '01',
            "with_opening" => $with_opening,
        ];

        $day = 2;
        $index = $days_equivalence[$first_day] + 1;

        while ($day <= $this->days_by_month[$this->selected_month]) {
            $opening_date_string = $this->selected_year.'-'.str_pad($this->selected_month, 2, 0, STR_PAD_LEFT).'-'.str_pad($day, 2, 0, STR_PAD_LEFT).' 00:00:00';
            $with_opening = 0;
            if (Opening::where('date', $opening_date_string)->count() > 0) {
                $checked_opening = Opening::where('date', $opening_date_string)->first();

                $remaining_seats = $checked_opening->seats;

                foreach ($checked_opening->valid_reservations as $existing_reservation) {
                    $remaining_seats -= $existing_reservation->seats;
                }
                $remaining_seats = max(0, $remaining_seats);
                if ($remaining_seats > 0) {
                    $with_opening = 1;
                }else{
                    $with_opening = 2;
                }
            }
            $this->days_with_info[$index] = [
                "day" => str_pad($day, 2, 0, STR_PAD_LEFT),
                "with_opening" => $with_opening,
            ];
            $day ++;
            $index ++;
        }
        // dd($this->days_with_info);
    }

    public function changeYear($direction)
    {
        if ($direction == 'up') {
            if ($this->selected_year < $this->max_year) {
                $this->selected_year += 1;
            }
        } elseif ($direction == 'down') {
            if ($this->selected_year > 2022) {
                $this->selected_year -= 1;
            }
        }

        $this->computeCalendarDates();
    }

    public function changeMonth($direction)
    {
        if ($direction == 'up') {
            if ($this->selected_month == '12') {
                if ($this->selected_year < $this->max_year) {
                    $this->selected_month = 1;
                    $this->selected_year += 1;
                }
            } else {
                $this->selected_month += 1;
            }
        } elseif ($direction == 'down') {
            if ($this->selected_month == '01') {
                if ($this->selected_year > 2022) {
                    $this->selected_month = 12;
                    $this->selected_year -= 1;
                }
            } else {
                $this->selected_month -= 1;
            }
        }

        $this->computeCalendarDates();
    }

    public function closeSelector()
    {
        $this->show_selector = 0;
        $this->emit('dateSelected', '');
    }

    public function selectDate($date)
    {
        $this->selected_day = $date;
        $emitted_date = $this->selected_year.'-'.str_pad($this->selected_month, 2, 0, STR_PAD_LEFT).'-'.$this->selected_day.' 00:00:00';

        $this->show_selector = 0;

        $this->emit('dateSelected', $emitted_date);
        // dd($emitted_date);
    }

    public function showDateSelector()
    {
        if ($this->show_selector) {
            $this->show_selector = 0;
            $this->emit('dateSelected', '');
        } else {
            $this->show_selector = 1;
        }
        $this->computeCalendarDates();
    }

    public function render()
    {
        $this->selected_date = $this->selected_day."/".str_pad($this->selected_month, 2, 0, STR_PAD_LEFT)."/".$this->selected_year;
        return view('livewire.tools.datepicker');
    }
}

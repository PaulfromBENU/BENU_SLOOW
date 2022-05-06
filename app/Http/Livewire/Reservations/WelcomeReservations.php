<?php

namespace App\Http\Livewire\Reservations;

use Livewire\Component;

use App\Models\Opening;
use App\Models\Reservation;

use Carbon\Carbon;

class WelcomeReservations extends Component
{
    public $opening_id;
    public $show_res_details = 0;

    public $seats_number = 1;
    public $res_first_name;
    public $res_email;
    public $res_last_name;
    public $res_phone;
    public $res_res_conditions_ok;
    public $res_message;

    public $message_sent = 0;
    public $safety_check = 0;
    public $checksum_number_1;
    public $checksum_number_2;
    public $user_sum;

    protected $rules = [
        'res_first_name' => 'required|min:2',
        'res_last_name' => 'required|min:2',
        'res_email' => 'required|email',
        'res_phone'  => 'nullable|min:6|max:30',
        'res_message' => 'nullable|max:1000',
        'res_conditions_ok' => 'min:0|max:1|nullable',
    ];

    public function mount()
    {
        $this->safety_check = 0;
        $this->user_sum = "";
        $this->checksum_number_1 = rand(1, 10);
        $this->checksum_number_2 = rand(1, 10);
        $this->res_conditions_ok = 0;
    }

    public function checkResSum()
    {
        if ($this->user_sum == $this->checksum_number_1 + $this->checksum_number_2) {
            $this->safety_check = 1;
        } else {
            $this->checksum_number_1 = rand(1, 10);
            $this->checksum_number_2 = rand(1, 10);
            $this->user_sum = "";
        }
    }

    public function restoreButton()
    {
        $this->message_sent = 0;
    }

    public function clearContent()
    {
        $this->res_first_name = "";
        $this->res_last_name = "";
        $this->res_email = "";
        $this->res_phone = "";
        $this->res_message = "";
        $this->res_conditions_ok = "";
    }

    public function updateSeatsNumber($direction = "up")
    {
        if ($direction == "up") {
            if (Opening::find($this->opening_id)) {
                $opening = Opening::find($this->opening_id);
                if ($opening->seats > $opening->valid_reservations()->count() + $this->seats_number) {
                    $this->seats_number ++;
                }
            }
        } else {
            if ($this->seats_number > 1) {
                $this->seats_number --;
            }
        }
    }

    public createReservation()
    {
        $this->validate();
    }

    public function render()
    {
        if ($this->opening_id == 0 || !Opening::find($this->opening_id)) {
            return view('livewire.reservations.welcome-reservations', [
                'openings' => Opening::where('date', '>=', Carbon::now()->addDay(1))->get(),
            ]);
        } else {
            return view('livewire.reservations.welcome-reservations', [
                'openings' => Opening::where('date', '>=', Carbon::now()->addDay(1))->get(),
                'opening' => Opening::find($this->opening_id),
            ]);
        }
    }
}

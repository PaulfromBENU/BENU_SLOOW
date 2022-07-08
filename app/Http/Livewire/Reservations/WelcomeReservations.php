<?php

namespace App\Http\Livewire\Reservations;

use Livewire\Component;

use Illuminate\Support\Facades\Mail;

use App\Models\Opening;
use App\Models\Reservation;
use App\Jobs\SendReservationEmails;

use Carbon\Carbon;

class WelcomeReservations extends Component
{
    public $opening_id;
    public $opening;
    public $show_res_details = 0;

    public $seats_number = 1;
    public $res_first_name;
    public $res_email;
    public $res_last_name;
    public $res_phone;
    public $res_conditions_ok;
    public $res_message;
    public $remaining_seats;
    public $initial_remaining_seats;

    public $message_sent = 0;
    public $safety_check = 0;
    public $checksum_number_1;
    public $checksum_number_2;
    public $user_sum;

    protected $listeners = ['dateSelected' => 'selectDate'];

    protected $rules = [
        'res_first_name' => 'required|min:2',
        'res_last_name' => 'required|min:2',
        'res_email' => 'required|email',
        'res_phone'  => 'nullable|min:6|max:30',
        'res_message' => 'nullable|max:1000',
        'res_conditions_ok' => 'min:0|max:1',
    ];

    public function mount()
    {
        $this->safety_check = 0;
        $this->user_sum = "";
        $this->checksum_number_1 = rand(1, 10);
        $this->checksum_number_2 = rand(1, 10);
        $this->res_conditions_ok = 0;
        $this->remaining_seats = 0;
        $this->initial_remaining_seats = 0;
        $this->show_res_details = 0;
        $this->opening_id = 0;
        $this->opening = null;
    }

    public function updatedOpeningId()
    {
        if (Opening::find($this->opening_id)) {
            $this->opening = Opening::find($this->opening_id);
            $this->remaining_seats = $this->opening->seats;

            foreach ($this->opening->valid_reservations as $existing_reservation) {
                $this->remaining_seats -= $existing_reservation->seats;
            }
            $this->remaining_seats = max(0, $this->remaining_seats);
            $this->initial_remaining_seats = $this->remaining_seats;
        } else {
            $this->show_res_details = 0;
            $this->opening_id = 0;
        }
        $this->message_sent = 0;
        $this->seats_number = 1;
        $this->show_res_details = 1;
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
        $this->seats_number = 1;
    }

    public function updateSeatsNumber($direction = "up")
    {
        if ($direction == "up") {
            if (Opening::find($this->opening_id)) {
                $opening = Opening::find($this->opening_id);
                if ($this->seats_number < $this->initial_remaining_seats) {
                    $this->seats_number ++;
                    $this->remaining_seats = $this->initial_remaining_seats - $this->seats_number;
                }
            }
        } else {
            if ($this->seats_number > 1) {
                $this->seats_number --;
                $this->remaining_seats = $this->initial_remaining_seats - $this->seats_number;
            }
        }
    }

    public function createReservation()
    {
        $this->validate();

        if (Opening::find($this->opening_id) && $this->res_conditions_ok == '1') {
            $new_reservation = new Reservation();
            $new_reservation->opening_id = $this->opening_id;
            $new_reservation->first_name = ucfirst($this->res_first_name);
            $new_reservation->last_name = ucfirst($this->res_last_name);
            $new_reservation->email = $this->res_email;
            $new_reservation->phone = $this->res_phone;
            $new_reservation->language = strtolower(app()->getLocale());
            if ($this->res_message !== null) {
                $new_reservation->other_info = $this->res_message;
            } else {
                $new_reservation->other_info = "";
            }
            $new_reservation->seats = $this->seats_number;
            if (Opening::find($this->opening_id)->type == '0') {
                $new_reservation->valid = 1;
            } else {
                $new_reservation->valid = 0;
            }
            if ($new_reservation->save()) {
                // dispatch here
                SendReservationEmails::dispatchAfterResponse($this->opening_id, $new_reservation, $this->res_email);

                $this->clearContent();
                $this->message_sent = 1;
                $this->opening_id = 0;
            }
        }
    }

    public function selectDate($date)
    {
        // dd($date);
        if (Opening::where('date', $date)->count() > 0) {
            $this->opening = Opening::where('date', $date)->first();
            $this->opening_id = $this->opening->id;
            $this->remaining_seats = $this->opening->seats;

            foreach ($this->opening->valid_reservations as $existing_reservation) {
                $this->remaining_seats -= $existing_reservation->seats;
            }
            $this->remaining_seats = max(0, $this->remaining_seats);
            $this->initial_remaining_seats = $this->remaining_seats;
            // Include initial seat suggested
            $this->remaining_seats -= 1;
        } else {
            $this->show_res_details = 0;
            $this->opening_id = 0;
        }
        $this->message_sent = 0;
        $this->seats_number = 1;
        $this->show_res_details = 1;
    }

    public function render()
    {
        if ($this->opening_id == 0 || !Opening::find($this->opening_id)) {
            return view('livewire.reservations.welcome-reservations', [
                'openings' => Opening::where('date', '>', Carbon::now())->get(),
            ]);
        } else {
            return view('livewire.reservations.welcome-reservations', [
                'openings' => Opening::where('date', '>', Carbon::now())->get(),
                'opening' => $this->opening,
            ]);
        }
    }
}

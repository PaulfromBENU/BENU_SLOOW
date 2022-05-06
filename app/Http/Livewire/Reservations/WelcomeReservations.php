<?php

namespace App\Http\Livewire\Reservations;

use Livewire\Component;

use App\Models\Opening;
use App\Models\Reservation;

use Carbon\Carbon;

class WelcomeReservations extends Component
{
    public $opening_id;
    public $show_details = 0;

    public $seats_number = 1;

    public function updateSeatsNumber($direction = "up")
    {
        if ($direction == "up") {
            $opening = Opening::find($this->opening_id);
            if ($opening->seats >= $opening->reservations) {
                // code...
            }
            $this->seats_number ++;
        } else {
            if ($this->seats_number > 1) {
                $this->seats_number --;
            }
        }
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

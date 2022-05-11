<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Models\Opening;
use App\Models\Reservation;

use Carbon\Carbon;

class Reservations extends Page
{
    protected static ?string $label = 'Manage reservations';
    protected static ?string $pluralLabel = 'Manage reservations';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static string $view = 'filament.pages.reservations';

    protected static ?string $navigationGroup = 'Meals & Reservations';

    public $pending_reservations;
    public $available_openings;
    public $valid_reservations;
    public $show_valid_reservations;
    public $valid_opening_date_id;
    public $valid_opening_date;
    public $opening_date_id;
    public $opening_date;
    public $remaining_seats;
    public $seats_number;
    public $res_first_name;
    public $res_last_name;
    public $res_email;
    public $res_phone;
    public $res_other_info;

    public function mount()
    {
        $this->getAllReservations();
        $this->seats_number = 1;
        $this->show_valid_reservations = false;
    }

    public function getAllReservations()
    {
        $this->pending_reservations = Reservation::whereHas('opening', function ($query) {
                $query->where('date', '>=', Carbon::now());
            })->where('valid', '0')->get();

        $this->available_openings = Opening::where('date', '>=', Carbon::now())->get();

        if (Opening::find($this->opening_date_id)) {
            $this->opening_date = Opening::find($this->opening_date_id);
            $this->remaining_seats = $this->opening_date->seats;

            foreach ($this->opening_date->valid_reservations as $existing_reservation) {
                $this->remaining_seats -= $existing_reservation->seats;
            }
            $this->remaining_seats = max(0, $this->remaining_seats);

        } else {
            $this->opening_date = null;
        }

        if (Opening::find($this->valid_opening_date_id)) {
            $this->valid_opening_date = Opening::find($this->valid_opening_date_id);
            $this->show_valid_reservations = true;
            $this->valid_reservations = $this->valid_opening_date->reservations()->where('valid', '1')->get();
        } else {
            $this->show_valid_reservations = false;
            $this->valid_opening_date = null;
            $this->valid_reservations = null;
        }
    }

    public function updatedOpeningDateId()
    {
        $this->getAllReservations();
    }

    public function updatedValidOpeningDateId()
    {
        $this->getAllReservations();
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

    public function createNewReservation()
    {
        if ($this->seats_number > 0
            && $this->seats_number <= $this->remaining_seats
            && strlen($this->res_first_name) > 1
            && strlen($this->res_last_name) > 1
            && strlen($this->res_email) > 4
            && strlen($this->res_phone) > 4) {
            
            $new_reservation = new Reservation();
            $new_reservation->opening_id = $this->opening_date_id;
            $new_reservation->first_name = $this->res_first_name;
            $new_reservation->last_name = $this->res_last_name;
            $new_reservation->email = $this->res_email;
            $new_reservation->phone = $this->res_phone;
            if ($this->res_other_info !== null) {
                $new_reservation->other_info = $this->res_other_info;
            } else {
                $new_reservation->other_info = "";
            }
            $new_reservation->seats = $this->seats_number;
            $new_reservation->valid = 1;
            if ($new_reservation->save()) {
                $this->reset();
                $this->getAllReservations();
            }
        }
    }

    public function validateReservation($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $reservation->valid = 1;
        $reservation->save();
        $this->getAllReservations();
    }
}

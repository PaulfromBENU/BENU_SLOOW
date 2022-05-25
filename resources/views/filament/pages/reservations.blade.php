<x-filament::page>
	<section class="reservations">
		<h1>
			Check valid reservations
		</h1>

		<div class="reservations__valid__selector">
			<label for="opening_date_id">Select an available date:</label><br/>
			<select name="opening_date_id" id="opening_date_id" wire:model="valid_opening_date_id">
				<option value="0">Select a date</option>
				@foreach($available_openings as $date)
					<option value="{{ $date->id }}" wire:key="check-reservations-{{ $date->id }}">{{ Carbon\Carbon::parse($date->date)->format('d\/m\/Y') }} - {{ $date->starting_hour }}</option>
				@endforeach
			</select>
		</div>

		@if($show_valid_reservations)
			@if($valid_reservations->count() == 0)
			<p>
				<em>
					No valid reservation for the moment for this date...
				</em>
			</p>
			@endif
			@foreach($valid_reservations as $valid_reservation)
			<div wire:key="valid-{{ $valid_reservation->id }}" class="flex justify-between reservations__valid__info">
				<div style="width: 25%; padding-right: 20px;">
					<p>
						<strong style="color: rgb(234 179 8);">Reservation made by:</strong>
					</p>
					<p>
						{{ ucfirst($valid_reservation->first_name) }} {{ ucfirst($valid_reservation->last_name) }}
					</p>
					<p>
						E-mail: <strong style="color: rgb(234 179 8);">{{ $valid_reservation->email }}</strong>
					</p>
					<p>
						Phone: <strong style="color: rgb(234 179 8);">{{ $valid_reservation->phone }}</strong>
					</p>
				</div>

				@if($valid_reservation->other_info !== null && $valid_reservation->other_info !== "")
				<div style="width: 25%; padding-right: 20px;">
					<p>
						<strong style="color: rgb(234 179 8);">Additional info:</strong>
					</p>
					<p>
						{{ $valid_reservation->other_info }}
					</p>
				</div>
				@endif

				<div style="width: 25%; padding-right: 20px;">
					<p>
						<strong style="color: rgb(234 179 8);">Number of seats booked:</strong>
					</p>
					<p style="font-size: 1.4rem; color: rgb(234 179 8);">
						{{ $valid_reservation->seats }}
					</p>
				</div>

				@if(isset($confirm_delete[$valid_reservation->id]) && $confirm_delete[$valid_reservation->id] !== null)
				<div style="width: 25%; text-align: center;">
					<p style="padding-bottom: 8px;">Are you sure? This will permanently delete the reservation.</p>
					<div class="flex justify-between">
						<button wire:click="unconfirmDelete({{ $valid_reservation->id }})">Keep Reservation</button>
						<button wire:click="cancelReservation({{ $valid_reservation->id }})">Cancel Reservation</button>
					</div>
				</div>
				@else
				<div class="flex justify-end" style="width: 25%; text-align: right;">
					<button wire:click="confirmDelete({{ $valid_reservation->id }})">Cancel Reservation</button>
				</div>
				@endif
			</div>
			@endforeach
		@endif
	</section>


	<section class="reservations">
		<h1>
			Create a reservation
		</h1>
		<div class="flex justify-between reservations__creator">
			<div>
				<label for="opening_date_id">Select an available date:</label><br/>
				<select name="opening_date_id" id="opening_date_id" wire:model="opening_date_id">
					<option value="0">Select a date</option>
					@foreach($available_openings as $date)
						<option value="{{ $date->id }}" wire:key="create-reservation-{{ $date->id }}">{{ Carbon\Carbon::parse($date->date)->format('d\/m\/Y') }} - {{ $date->starting_hour }}</option>
					@endforeach
				</select>
			</div>
			<div>
				@if($opening_date !== null)
				<p style="font-size: 1.3rem;">
					<br/>
					Remaining seats: <strong style="color: rgb(234 179 8); font-size: 1.5rem;">{{ $remaining_seats }}</strong>
				</p>
				@endif
			</div>
		</div>
		@if($opening_date !== null)
		<div class="reservations__form">
			<div class="flex justify-center" style="margin-top: 20px; margin-bottom: 30px;">
                <h3 style="font-size: 1.3rem; margin-right: 10px; padding-top: 4px;">
                    Number of seats to book:
                </h3>
                <input type="number" max="{{ $remaining_seats }}" name="seats_number" wire:model.defer="seats_number" style="background: transparent;">
	        </div>


	        <div class="flex justify-between relative">
	            <div style="width: 45%;">
	                <div class="input-group reactive-label-input">
	                    <p class="welcome-reservation__form__labels">First Name</p>
	                    <input type="text" id="res_first_name" name="res_first_name" class="input-underline w-full" tabindex="1" minlength="2" maxlength="255" required wire:model.defer="res_first_name">
	                    @error('res_first_name')
	                        <div class="primary-color">{{ $message }}</div>
	                    @enderror
	                </div>

	                <div class="input-group reactive-label-input">
	                    <p class="welcome-reservation__form__labels">E-mail</p>
	                    <input type="email" name="res_email" class="input-underline w-full" tabindex="3" minlength="2" maxlength="255" required wire:model.defer="res_email">
	                </div>
	            </div>

	            <div style="width: 45%;">
	                <div class="input-group reactive-label-input">
	                    <p class="welcome-reservation__form__labels">Last Name</p>
	                    <input type="text" name="res_last_name" class="input-underline w-full" tabindex="2" minlength="2" maxlength="255" required wire:model.defer="res_last_name">
	                </div>
	                <div class="input-group reactive-label-input">
	                    <p class="welcome-reservation__form__labels">Phone</p>
	                    <input type="text" name="res_phone" class="input-underline w-full" minlength="6" maxlength="30" tabindex="4" wire:model.defer="res_phone" required>
	                </div>
	            </div>
	        </div>
	        <div class="mt-10 mb-10" style="position: relative;">
	            <textarea maxlength="1000" rows="3" class="w-full rounded p-10" tabindex="5" wire:model.defer="res_other_info" placeholder="Other information (allergies, ...)"></textarea>
	        </div>
	        <div class="text-center">
                <button wire:click="createNewReservation">Create new reservation</button>
            </div>
		</div>
		@endif
	</section>


	<section class="reservations">
		<h1>
			Reservations waiting for confirmation
		</h1>
		@if($pending_reservations->count() == 0)
		<p>
			<em>
				No pending reservation for the moment...
			</em>
		</p>
		@endif
		@foreach($pending_reservations as $pending_reservation)
		<div wire:key="pending-{{ $pending_reservation->id }}" class="flex justify-between reservations__pending">
			<div style="width: 22%;">
				<p>
					<strong style="color: rgb(234 179 8);">Reservation made by:</strong>
				</p>
				<p>
					{{ ucfirst($pending_reservation->first_name) }} {{ ucfirst($pending_reservation->last_name) }}
				</p>
				<p>
					E-mail: <strong style="color: rgb(234 179 8);">{{ $pending_reservation->email }}</strong>
				</p>
				<p>
					Phone: <strong style="color: rgb(234 179 8);">{{ $pending_reservation->phone }}</strong>
				</p>
			</div>

			<div style="width: 18%;">
				<p>
					<strong style="color: rgb(234 179 8);">Number of seats booked:</strong>
				</p>
				<p>
					{{ $pending_reservation->seats }}
				</p>
			</div>

			@if($pending_reservation->other_info !== null && $pending_reservation->other_info !== "")
			<div style="width: 22%;">
				<p>
					<strong style="color: rgb(234 179 8);">Additional info:</strong>
				</p>
				<p>
					{{ $pending_reservation->other_info }}
				</p>
			</div>
			@else
			<div style="width: 22%;"></div>
			@endif

			@if(isset($confirm_delete[$pending_reservation->id]) && $confirm_delete[$pending_reservation->id] !== null)
			<div style="width: 38%; text-align: center;">
				<p style="padding-bottom: 8px;">Are you sure? This will permanently delete the reservation.</p>
				<div class="flex justify-between">
					<button wire:click="unconfirmDelete({{ $pending_reservation->id }})">Keep Reservation</button>
					<button wire:click="cancelReservation({{ $pending_reservation->id }})">Cancel Reservation</button>
				</div>
			</div>
			@else
			<div class="flex justify-between" style="width: 38%; text-align: right;">
				<button wire:click="confirmDelete({{ $pending_reservation->id }})">Cancel Reservation</button>
				<button wire:click="validateReservation({{ $pending_reservation->id }})">Validate Reservation</button>
			</div>
			@endif
		</div>
		@endforeach
	</section>
</x-filament::page>

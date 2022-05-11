<form method="POST" wire:submit.prevent="createReservation" class="welcome-reservation__form">
    @csrf
    <h4 class="text-center">
        Choisis une date pour ta réservation
    </h4>
    <div class="text-center welcome-reservation__form__selector">
        <select wire:model="opening_id">
            <option value="0">
                Sélectionne une date...
            </option>
            @foreach($openings as $opening)
                <option wire:key="{{ $opening->id }}" value="{{ $opening->id }}">
                    {{ Carbon\Carbon::parse($opening->date)->format('d\/m\/Y') }} - {{ $opening->starting_hour }}
                </option>
            @endforeach
        </select>
    </div>

    @if($show_res_details)
    <div class="pt-5">
        <h4 class="text-center">Tu as choisi le repas suivant :</h4>
        <div class="flex justify-around flex-wrap text-white">
            <p>
                Date : {{ Carbon\Carbon::parse($opening->date)->format('d\/m\/Y') }}
            </p>
            <p>
                Heure : {{ $opening->starting_hour }}
            </p>
            @if($opening->type == '0')
            <p>
                Places restantes : {{ $remaining_seats }}
            </p>
            @endif
        </div>
    </div>
    @endif

    @if($show_res_details)
    <div>
    @else
    <div style="display: none;"> <!-- style="display: none;" -->
    @endif
        <div>
            <div class="flex justify-center mt-10 mb-5">
                <h4 class="welcome-reservation__form__seats-subtitle">
                    Nombre de places à réserver :
                </h4>
                <p class="welcome-reservation__form__seats-number ml-5">
                    x {{ $seats_number }}
                </p>
                <div class="ml-5">
                    <p class="welcome-reservation__form__seats-btn" wire:click.prevent.stop="updateSeatsNumber('up')">
                        <i class="fas fa-plus"></i>
                    </p>
                    <p class="welcome-reservation__form__seats-btn" wire:click.prevent.stop="updateSeatsNumber('down')">
                        <i class="fas fa-minus"></i>
                    </p>
                </div>
                <input type="hidden" name="seats_number" wire:model="seats_number">
            </div>
        </div>


        <div class="flex justify-between relative">
            <div class="w-5/12">
                <div class="input-group reactive-label-input">
                    <p class="welcome-reservation__form__labels">{{ __('forms.first-name') }} *</p>
                    <input type="text" id="res_first_name" name="res_first_name" class="input-underline w-full" tabindex="1" minlength="2" maxlength="255" required wire:model.defer="res_first_name" style="color: white;">
                    @error('res_first_name')
                        <div class="primary-color">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group reactive-label-input">
                    <p class="welcome-reservation__form__labels">{{ __('forms.email') }} *</p>
                    <input type="email" name="res_email" class="input-underline w-full" tabindex="3" minlength="2" maxlength="255" required wire:model.defer="res_email" style="color: white;">
                </div>
            </div>

            <div class="w-5/12">
                <div class="input-group reactive-label-input">
                    <p class="welcome-reservation__form__labels">{{ __('forms.last-name') }} *</p>
                    <input type="text" name="res_last_name" class="input-underline w-full" tabindex="2" minlength="2" maxlength="255" required wire:model="res_last_name" style="color: white;">
                </div>
                <div class="input-group reactive-label-input">
                    <p class="welcome-reservation__form__labels">{{ __('forms.phone') }} *</p>
                    <input type="text" name="res_phone" class="input-underline w-full" minlength="6" maxlength="30" tabindex="4" wire:model="res_phone" required style="color: white;">
                </div>
            </div>
        </div>
        <div class="mt-10 mb-10" style="position: relative;">
            <label style="position: absolute; top: 10px; left: 20px;" class="primary-color">{{ __('forms.message') }}</label>
            <textarea maxlength="1000" rows="3" class="w-full rounded p-10" tabindex="5" wire:model="res_message"></textarea>
            <p class="contact__form__form__mandatory" style="color: white;">
                * {{ __('forms.mandatory-fields') }}
            </p>
            <div class="register__options">
                <label for="res_agreement" class="inline-flex items-center contact__form__form__select">
                    <input id="res_agreement" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm" name="res_res_conditions_ok" value="1" tabindex="6" style="margin-top: 2px;" wire:model="res_conditions_ok" wire:click="restoreButton">
                    <span class="ml-8" style="color: white;">{{ __('forms.personal-data-agreement') }} *</span>
                </label>
            </div>
        </div>

        @if(!$message_sent)
            @if(!$safety_check)
            <div class="contact__form__form__security flex w-2/3 m-auto justify-between">
                <p style="color: white;">{!! __('forms.security-question') !!} {{ $checksum_number_1 }} + {{ $checksum_number_2 }}&nbsp;?</p>
                <input type="text" minlength="1" maxlength="2" class="ml-8 input-underline" tabindex="7" required wire:model.defer="user_sum" style="height: 40px;">
                <div wire:click="checkResSum" class="contact__form__form__security__btn btn-couture-plain" style="height: 50px; margin-left: 30px;">{{ __('forms.check') }}</div>
            </div>
            @elseif($safety_check == 1)
            <div class="text-center">
                <button class="btn-couture-plain m-auto" style="height: 50px;">{{ __('forms.send-message') }}</button>
            </div>
            @endif
        @else
            <div class="contact__form__valid">
                Votre demande de réservation a bien été envoyée ! Vous recevrez une confirmation dans les plus brefs délais. Si vous ne recevez pas de nouvelles de notre part rapidement, n'hésitez pas à nous recontacter par téléphone.
            </div>
        @endif
    </div>
</form>

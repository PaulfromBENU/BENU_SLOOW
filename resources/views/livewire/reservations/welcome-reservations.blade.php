<form method="POST" wire:submit.prevent="createReservation" class="welcome-reservation__form">
    @csrf

    <div class="relative">
        <div class="flex justify-center lg:justify-between flex-wrap">
            <div class="w-full lg:w-5/12 input-group reactive-label-input">
                <p class="welcome-reservation__form__labels">{{ __('forms.first-name') }} *</p>
                <input type="text" id="res_first_name" name="res_first_name" class="input-underline w-full" tabindex="1" minlength="2" maxlength="255" required wire:model.defer="res_first_name" style="color: white;">
                @error('res_first_name')
                    <div class="primary-color">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-full lg:w-5/12 input-group reactive-label-input">
                <p class="welcome-reservation__form__labels">{{ __('forms.last-name') }} *</p>
                <input type="text" name="res_last_name" class="input-underline w-full" tabindex="2" minlength="2" maxlength="255" required wire:model="res_last_name" style="color: white;">
            </div>
        </div>

        <div class="flex justify-center lg:justify-between flex-wrap">
            <div class="w-full lg:w-5/12 input-group reactive-label-input">
                <p class="welcome-reservation__form__labels">{{ __('forms.email') }} *</p>
                <input type="email" name="res_email" class="input-underline w-full" tabindex="3" minlength="2" maxlength="255" required wire:model.defer="res_email" style="color: white;">
            </div>

            <div class="w-full lg:w-5/12 input-group reactive-label-input">
                <p class="welcome-reservation__form__labels">{{ __('forms.phone') }} *</p>
                <input type="text" name="res_phone" class="input-underline w-full" minlength="6" maxlength="30" tabindex="4" wire:model="res_phone" required style="color: white;">
            </div>
        </div>

        <div class="flex justify-center lg:justify-between flex-wrap">
            <div class="w-full lg:w-5/12 input-group reactive-label-input" id="reservation-anchor">
                <p class="welcome-reservation__form__labels" style="position: relative; bottom: 0;">{{ __('forms.select-date') }} *</p>
                <div class="text-left welcome-reservation__form__selector">
                    @livewire('tools.datepicker')
                    <!-- <select wire:model="opening_id">
                        <option value="0">
                            {!! __('forms.reservation-choose') !!}
                        </option>
                        @foreach($openings as $opening_option)
                            <option wire:key="{{ $opening_option->id }}" value="{{ $opening_option->id }}">
                                {{ Carbon\Carbon::parse($opening_option->date)->format('d\/m\/Y') }}
                            </option>
                        @endforeach
                    </select> -->
                </div>
            </div>

            <div class="w-full lg:w-5/12 input-group reactive-label-input mt-5">
                <p class="welcome-reservation__form__labels" style="position: relative; bottom: 0;">{{ __('forms.res-time') }} *</p>
                <div class="text-left welcome-reservation__form__heavy pt-3 pb-3">
                    @if($opening_id !== 0)
                    {{ $opening->starting_hour }}
                    @endif
                </div>
            </div>
        </div>

        <div class="flex justify-center lg:justify-between flex-wrap mb-2">
            <div class="w-full lg:w-5/12 input-group reactive-label-input pt-4 pb-4">
                <p class="welcome-reservation__form__labels" style="position: relative; bottom: 0;">{{ __('forms.res-guests') }} *</p>
                <div class="flex justify-between lg:justify-start welcome-reservation__form__guests">
                    <p class="welcome-reservation__form__heavy mr-10" style="font-weight: 400; font-size: 2.1rem;">
                        <i class="far fa-user"></i>
                    </p>
                    <p class="welcome-reservation__form__heavy mr-7" style="width: 30px;">
                        {{ $seats_number }}
                    </p>
                    <button class="welcome-reservation__form__guests__btn" wire:click.prevent.stop="updateSeatsNumber('down')">
                        -
                    </button>
                    <button class="welcome-reservation__form__guests__btn" wire:click.prevent.stop="updateSeatsNumber('up')">
                        +
                    </button>
                </div>
            </div>

            @if($opening_id !== 0 && $opening->type == '0')
            <div class="w-full lg:w-5/12 input-group reactive-label-input pt-4 pb-4">
                <p class="welcome-reservation__form__labels" style="position: relative; bottom: 0;">{{ __('forms.res-remaining-seats') }} *</p>
                <div class="text-left welcome-reservation__form__heavy pt-3">
                    {{ $remaining_seats }} <span style="font-weight: 300;">/ {{ $opening->seats }}</span>
                </div>
            </div>
            @endif
        </div>
    </div>


    <div class="mt-12 mb-5" style="position: relative;">
        <label style="position: absolute; top: 10px; left: 20px;" class="primary-color">{!! __('forms.res-message') !!}</label>
        <textarea maxlength="500" rows="1" class="w-full rounded p-10" tabindex="5" wire:model="res_message"></textarea>
        <p class="welcome-reservation__form__mandatory">
            * {{ __('forms.mandatory-fields') }}
        </p>
        <div class="register__options">
            <label for="res_agreement" class="inline-flex items-center welcome-reservation__form__select">
                <input id="res_agreement" type="checkbox" class="rounded border-white shadow-sm" name="res_conditions_ok" value="1" tabindex="6" style="margin-top: 2px; border-color: white;" wire:model="res_conditions_ok" wire:click="restoreButton" required>
                <span class="ml-8" style="color: white; font-family: 'Barlow'; font-size: 0.9rem;">{{ __('forms.personal-data-agreement') }} *</span>
            </label>
        </div>
    </div>

    @if(!$message_sent)
        @if(!$safety_check)
        <div class="contact__form__form__security flex w-2/3 m-auto justify-between flex-wrap">
            <p style="color: white;">{!! __('forms.security-question') !!} {{ $checksum_number_1 }} + {{ $checksum_number_2 }}&nbsp;?</p>
            <input type="text" minlength="1" maxlength="2" class="ml-8 input-underline rounded" tabindex="7" required wire:model.defer="user_sum" style="height: 40px;">
            <div wire:click="checkResSum" class="contact__form__form__security__btn btn-couture-plain">{{ __('forms.check') }}</div>
        </div>
        @elseif($safety_check == 1)
        <div class="text-center">
            <button class="btn-couture-plain m-auto" style="height: 50px;">{{ __('forms.send-message') }}</button>
        </div>
        @endif
    @else
        <div class="contact__form__valid">
            {!! __('forms.reservation-confirmation-message') !!}
        </div>
    @endif

</form>

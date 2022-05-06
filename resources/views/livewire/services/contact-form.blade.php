<form method="POST" action="" class="contact__form w-full m-auto mb-10" wire:submit.prevent="sendMessage" @if($safety_check == 0) onsubmit="event.preventDefault();" @endif>
    @csrf
    <div class="flex justify-between">
        <div class="w-5/12">
            <div class="flex justify-start input-group contact__form__radio-group">
                <div class="mr-5 ml-1">
                    <input type="radio" id="contact_gender_male" name="gender" value="male" wire:model="gender">
                    <label for="contact_gender_male" class="pl-4">{{ __('forms.sir') }}</label><br>
                </div>
                <div class="mr-5">
                    <input type="radio" id="contact_gender_female" name="gender" value="female" wire:model="gender">
                    <label for="contact_gender_female" class="pl-4">{{ __('forms.madam') }}</label><br>
                </div>
                <div>
                    <input type="radio" id="contact_gender_neutral" name="gender" value="neutral" wire:model="gender">
                    <label for="contact_gender_neutral" class="pl-4">{{ __('forms.neutral') }}</label> 
                </div>
            </div>
            <div class="input-group reactive-label-input">
                @if($first_name != "")
                    <label for="contact_first_name" class="reactive-label-input__label-active">{{ __('forms.first-name') }} *</label>
                @else
                    <label for="contact_first_name">{{ __('forms.first-name') }} *</label>
                @endif
                <input type="text" id="contact_first_name" name="first_name" class="input-underline w-full" tabindex="10" minlength="2" maxlength="255" required wire:model.defer="first_name">
                @error('first_name')
                    <div class="primary-color">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group reactive-label-input">
                @if($contact_email != "")
                    <label class="reactive-label-input__label-active">{{ __('forms.email') }} *</label>
                @else
                    <label>{{ __('forms.email') }} *</label>
                @endif
                <input type="email" name="contact_email" class="input-underline w-full" tabindex="13" minlength="2" maxlength="255" required wire:model.defer="contact_email">
            </div>
        </div>

        <div class="w-5/12">
            <div class="input-group reactive-label-input">
                
            </div>
            <div class="input-group reactive-label-input">
                @if($last_name != "")
                    <label class="reactive-label-input__label-active">{{ __('forms.last-name') }} *</label>
                @else
                    <label>{{ __('forms.last-name') }} *</label>
                @endif
                <input type="text" name="last_name" class="input-underline w-full" tabindex="12" minlength="2" maxlength="255" required wire:model="last_name">
            </div>
            <div class="input-group reactive-label-input">
                @if($phone != "")
                    <label class="reactive-label-input__label-active">{{ __('forms.phone') }}</label>
                @else
                    <label>{{ __('forms.phone') }} *</label>
                @endif
                <input type="text" name="phone" class="input-underline w-full" minlength="6" maxlength="30" tabindex="14" wire:model="phone" required>
            </div>
        </div>
    </div>
    <div class="mt-10 mb-10" style="position: relative;">
        <label style="position: absolute; top: 10px; left: 20px;">{{ __('forms.message') }} *</label>
        <textarea minlength="1" maxlength="2000" rows="5" class="w-full rounded" tabindex="15" wire:model="message">
                
        </textarea>
        <p class="contact__form__form__mandatory">
            * {{ __('forms.mandatory-fields') }}
        </p>
        <div class="register__options">
            <label for="contact_agreement" class="inline-flex items-center contact__form__form__select">
                <input id="contact_agreement" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm" name="conditions_ok" value="1" tabindex="16" style="margin-top: 2px;" wire:model="conditions_ok" wire:click="restoreButton">
                <span class="ml-8">{{ __('forms.personal-data-agreement') }} *</span>
            </label>
        </div>
    </div>

    @if(!$message_sent)
        @if(!$safety_check)
        <div class="contact__form__form__security flex w-2/3 m-auto justify-between">
            <p>{!! __('forms.security-question') !!} {{ $checksum_number_1 }} + {{ $checksum_number_2 }}&nbsp;?</p>
            <input type="text" minlength="1" maxlength="2" class="ml-8 input-underline" required wire:model.defer="user_sum" style="height: 40px;">
            <div wire:click="checkSum" class="contact__form__form__security__btn btn-couture-plain" style="height: 50px; margin-left: 30px;">{{ __('forms.check') }}</div>
        </div>
        @elseif($safety_check == 1)
        <input type="submit" name="contact_submit" value="{{ __('forms.send-message') }}" class="btn-couture-plain" style="height: 50px;">
        @endif
    @else
        @if($message_valid)
            <div class="contact__form__valid">
                {{ $submit_feedback }}
            </div>
        @else
            <div class="contact__form__invalid">
                {{ $submit_feedback }}
            </div>
        @endif
    @endif
</form>

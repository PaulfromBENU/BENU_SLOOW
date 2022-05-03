<div class="modal add-address-modal" style="padding: 20px;">
    <form method="POST" action="{{ route('dashboard.add-address', ['locale' => app()->getLocale()]) }}" style="overflow-y: auto; height: 100%;">
        @csrf
        <input type="hidden" name="address_id" wire:model="address_id">
        <div class="register__address" style="margin-top: 0; margin-bottom: 0; background: transparent;">
            <h4 class="register__address__title" style="margin-bottom: 10px;">
                @if($is_update == "0")
                {{ __('forms.register-add-address') }}
                @else
                {{ __('forms.register-update-address') }}
                @endif
            </h4>
            <div class="register__address__address-name" style="background: transparent; margin-bottom: 0px;">
                <div class="reactive-label-input">
                    <label @if($address_name != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                        {{ __('forms.register-address-name') }} <span class="register_optionnal_star">*</span>
                    </label>
                    <input type="text" name="register_address_name" class="input-underline w-full register_address_field register_address_field_mandatory" style="color: black;" tabindex="7" maxlength="150" required wire:model="address_name">
                </div>
                <p class="text-sm"><em>{{ __('forms.register-address-required') }}</em></p>
            </div>
            <div class="flex justify-between">
                <div class="w-5/12">
                    <div class="input-group reactive-label-input">
                        <label @if($address_first_name != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                            {{ __('forms.first-name') }} <span class="register_optionnal_star">*</span>
                        </label>
                        <input type="text" name="register_address_first_name" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="8" maxlength="255" required wire:model="address_first_name">
                    </div>
                    <div class="input-group reactive-label-input">
                        <label @if($address_street_number != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                            {{ __('forms.register-address-street-number') }} <span class="register_optionnal_star">*</span>
                        </label>
                        <input type="text" name="register_address_number" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="10" required wire:model="address_street_number">
                    </div>
                    <div class="input-group reactive-label-input">
                        <label @if($address_floor != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                            {{ __('forms.register-address-floor') }}
                        </label>
                        <input type="text" name="register_address_floor" class="input-underline w-full register_address_field" tabindex="12" maxlength="50" wire:model="address_floor">
                    </div>
                    <div class="input-group reactive-label-input">
                        <label @if($address_city != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                            {{ __('forms.register-address-city') }} <span class="register_optionnal_star">*</span>
                        </label>
                        <input type="text" name="register_address_city" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="14" maxlength="150" required wire:model="address_city">
                    </div>
                </div>

                <div class="w-5/12">
                    <div class="input-group reactive-label-input">
                        <label @if($address_last_name != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                            {{ __('forms.last-name') }} <span class="register_optionnal_star">*</span>
                        </label>
                        <input type="text" name="register_address_last_name" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="9" maxlength="255" required wire:model="address_last_name">
                    </div>
                    <div class="input-group reactive-label-input">
                        <label @if($address_street != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                            {{ __('forms.register-address-street-name') }} <span class="register_optionnal_star">*</span>
                        </label>
                        <input type="text" name="register_address_street" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="11" maxlength="255" required wire:model="address_street">
                    </div>
                    <div class="input-group reactive-label-input">
                        <label @if($address_zip != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                            {{ __('forms.register-address-zip') }} <span class="register_optionnal_star">*</span>
                        </label>
                        <input type="text" name="register_address_zip" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="13" maxlength="10" required wire:model="address_zip">
                    </div>
                    <div class="input-group reactive-label-input">
                        <label @if($address_phone != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                            {{ __('forms.register-address-phone') }} <span class="register_optionnal_star">*</span>
                        </label>
                        <input type="text" name="register_address_phone" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="15" maxlength="30" required wire:model="address_phone">
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label style="color: gray; bottom: 35px; font-size: 0.8rem;">
                    {{ __('forms.register-address-country') }} <span class="register_optionnal_star">*</span>
                </label>
                <select name="register_address_country" class="input-underline w-full register_address_field register_address_field_mandatory" tabindex="16" maxlength="50" required wire:model="address_country">
                    @foreach($country_options as $country)
                    <option value="{{ $country->country_code }}">
                        {{ $country->$localized_country }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="w-full reactive-label-input">
                <label @if($address_other != "") style="color: darkgray; bottom: 35px; transform: scale(0.75);" @else style="color: black;" @endif>
                    {{ __('forms.register-address-other') }}
                </label>
                <input type="text" name="register_address_other" class="input-underline w-full register_address_field" tabindex="17" maxlength="255" wire:model="address_other">
            </div>
        </div>

        <div class="text-center">
            <button class="btn-couture-plain mb-5" style="height: fit-content;">{{ __('forms.address-add-new') }}</button>
        </div>
    </form>
</div>
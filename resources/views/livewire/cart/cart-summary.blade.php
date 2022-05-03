<div class="cart-summary">
    <div class="flex justify-between cart-summary__price">
        <p>
            {{ __('cart.sub-total') }}
        </p>
        <p>
            {{ $articles_sum }}&euro;
        </p>
    </div>

    @if($with_extra > 0)
    <div class="flex justify-between cart-summary__price">
        <p>
            @if($in_tunnel)
            {{ __('cart.extra-pillow-final-price') }}
            @else
            {{ __('cart.extra-pillow-estimate') }}
            @endif
        </p>
        <p>
            {{ $with_extra }}&euro;
        </p>
    </div>
    @endif

    <div class="flex justify-between cart-summary__price">
        <p>
            @if($in_tunnel)
            {{ __('cart.delivery-final-price') }}
            @else
            {{ __('cart.delivery-estimate') }}
            @endif
        </p>
        <p>
            @if($delivery_sum == 0)
            {{ strtoupper(__('cart.delivery-free')) }}
            @else
                {{ $delivery_sum }}&euro;
            @endif
        </p>
    </div>

    @if($gift_sum > 0)
    <div class="flex justify-between cart-summary__price">
        <p>
            @if($in_tunnel)
            {{ __('cart.gift-final-price') }}
            @else
            {{ __('cart.gift-estimate') }}
            @endif
        </p>
        <p>
            {{ $gift_sum }}&euro;
        </p>
    </div>
    @endif

    @if(!$in_tunnel)
    <div class="cart-summary__use-voucher">
        <div class="flex">
            <input type="checkbox" name="cart_use_voucher" id="cart-use-voucher" wire:model="use_voucher">
            <label for="cart-use-voucher">{{ __('cart.use-voucher') }}</label>
        </div>
        @if($use_voucher)
            <input type="text" name="voucher_code" wire:model="voucher_code" class="w-full mt-5">
            @if($voucher_status == 1)
            <p class="primary-color">
                <em>{{ __('cart.voucher-incorrect') }}</em>
            </p>
            @endif
            @if($voucher_verified)
            <div class="flex justify-between cart-summary__price">
                <p>
                    <strong>{{ __('cart.voucher-remaining-value') }}&nbsp;:</strong>
                </p>
                <p>
                    <strong>{{ $voucher_current_value }}&euro;</strong>
                </p>
            </div>
            <div class="flex justify-between cart-summary__price">
                <p>
                    <strong>{{ __('cart.voucher-remaining-value-after') }}&nbsp;:</strong>
                </p>
                <p>
                    <strong>{{ $voucher_remaining_value }}&euro;</strong>
                </p>
            </div>
            @else
                <button class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover mt-5 w-full" wire:click="checkVoucher" style="margin-left: 0;">{{ __('cart.voucher-check') }}</button>
            @endif
        @endif
    </div>

    @else
    <div class="flex justify-between cart-summary__price">
        <p>
            {{ __('cart.voucher-reduction') }}
        </p>
        <p>
            -{{ $voucher_current_value - $voucher_remaining_value }}&euro;
        </p>
    </div>
    @endif

    <div class="flex justify-between cart-summary__price">
        <p>
            @if($in_tunnel)
            <strong>{{ __('cart.total-final-price') }}</strong>
            @else
            <strong>{{ __('cart.total-estimate') }}</strong>
            @endif
        </p>
        <p>
            <strong>{{ number_format((float)$total, 2, '.', '') }}&euro;</strong>
        </p>
    </div>

    @if($show_payment_btn)
    <div>
        <a href="{{ route('payment-'.app()->getLocale()) }}" class="block btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover w-full" style="margin: 0;">
            {{ __('cart.make-order') }}
        </a>
    </div>
    @endif

    <div class="cart-summary__payment-options">
        <h4 class="text-center">{{ __('cart.payment-options') }}</h4>
        <div class="flex justify-center flex-wrap">
            <img src="{{ asset('images/pictures/services_payment_cards.png') }}" alt="Payment with Visa, Mastercard, AmEx" />
            <img src="{{ asset('images/pictures/services_payment_digicash.png') }}" alt="Payment with Digicash" />
            <img src="{{ asset('images/pictures/services_payment_paypal.png') }}" alt="Payment with PayPal" />
            <img src="{{ asset('images/pictures/services_payment_transfer.png') }}" alt="Payment with Bank Transfer" />
        </div>
    </div>
</div>
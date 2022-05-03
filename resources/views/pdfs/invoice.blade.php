<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Votre facture BENU</title>

	<style type="text/css">
		@font-face {
			font-family: "Barlow Condensed Regular";
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-Regular.ttf') }}) format('truetype');
		}

		@font-face {
			font-family: "Barlow Condensed Medium";
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-Medium.ttf') }}) format('truetype');
		}

		@font-face {
			font-family: "Barlow Condensed Medium Italic";
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-MediumItalic.ttf') }}) format('truetype');
		}

		@font-face {
			font-family: "Barlow Condensed SemiBold";
			src: url({{ storage_path('fonts/BarlowCondensed/BarlowCondensed-SemiBold.ttf') }}) format('truetype');
		}
	</style>
</head>
<body style="width: 100%; margin-left: 0%; font-family: 'Barlow Condensed Regular'; font-size: 0.9rem; position: relative;">
	<div style="position: relative; padding-left: 0px; margin-bottom: 50px; height: 180px;">
		<div style="position: absolute; top: 0; left: 0px;">
			<img src="{{ asset('images/pictures/logo_benu_green.png') }}" style="height: 180px;" />
		</div>
		<div style="position: absolute; top: 18px; left: 80px;">
			<p style="font-family: 'Barlow Condensed SemiBold'; margin-bottom: 0px; padding-bottom: 0px;">
				BENU Village Esch asbl
			</p>
			<p>
				51 rue d'Audun
				<br/>
				4018 Esch-sur-Alzette
				<br/>
				Luxembourg
				<br/>
				+352 27 91 19 49
				<br/>
				<span style="color: #27955B;">
					benu@benuvillageesch.lu
				</span>
			</p>
		</div>
	</div>

	<div style="position: relative; height: 170px;">
		<p style="position: absolute; top: 0; left: 0; width: 40%;">
			<span style="font-family: 'Barlow Condensed SemiBold'; margin-bottom: 0px; padding-bottom: 0px;">
				{{ __('pdf.invoice-delivery-address') }}
			</span>
			<br/>
			@if($order->address_id == 0)
				{{ __('pdf.invoice-collect-in-shop') }} - BENU Esch
				<br/>
				51 rue d'Audun
				<br/>
				4018 Esch-sur-Alzette
				<br/>
				Luxembourg
			@else
				{{ ucfirst($order->address->last_name) }} {{ ucfirst($order->address->first_name) }}
				<br/>
				{{ $order->address->street_number }}, {{ $order->address->street }}
				<br/>
				{{ $order->address->zip_code }} {{ $order->address->city }}
				<br/>
				{{ $countries[$order->address->country] }}
				<br/>
				@if($order->address->floor !== "" && $order->address->floor !== null)
				{{ __('pdf.invoice-delivery-address-more-info') }} : {{ $order->address->floor }}
				@endif
			@endif
		</p>
		<p style="position: absolute; top: 0; left: 50%; width: 40%;">
			<span style="font-family: 'Barlow Condensed SemiBold'; margin-bottom: 0px; padding-bottom: 0px;">
				{{ __('pdf.invoice-invoice-address') }}
			</span>
			<br/>
			{{ ucfirst($order->invoice_address->last_name) }} {{ ucfirst($order->invoice_address->first_name) }}
			<br/>
			{{ $order->invoice_address->street_number }}, {{ $order->invoice_address->street }}
			<br/>
			{{ $order->invoice_address->zip_code }} {{ $order->invoice_address->city }}
			<br/>
			{{ $countries[$order->invoice_address->country] }}
			<br/>
			@if($order->invoice_address->floor !== "" && $order->invoice_address->floor !== null)
			{{ __('pdf.invoice-delivery-address-more-info') }} : {{ $order->invoice_address->floor }}
			@endif
		</p>
	</div>

	<div>
		<p style="color: #27955B; font-size: 1.4rem; font-family: 'Barlow Condensed Medium'; margin-bottom: 0; padding-bottom: 0;">
			{{ __('pdf.invoice-order-number') }} N<sup>o</sup> {{ $order->unique_id }}
		</p>
		<div style="position: relative; height: 80px;">
			<p style="position: absolute; width: 25%; top: 0; left: 0;">
				<span style="font-family: 'Barlow Condensed SemiBold'; margin-bottom: 0px; padding-bottom: 0px;">
					{{ __('pdf.invoice-your-order-number') }} :
				</span>
				<br/>
				{{ $order->unique_id }}
			</p>
			<p style="position: absolute; width: 25%; top: 0; left: 25%;">
				<span style="font-family: 'Barlow Condensed SemiBold'; margin-bottom: 0px; padding-bottom: 0px;">
					{{ __('pdf.invoice-date') }} :
				</span>
				<br/>
				{{ $order->created_at->format('d\/m\/Y') }}
			</p>
			<p style="position: absolute; width: 25%; top: 0; left: 50%;">
				<span style="font-family: 'Barlow Condensed SemiBold'; margin-bottom: 0px; padding-bottom: 0px;">
					{{ __('pdf.invoice-payment-method') }} :
				</span>
				<br/>
				@switch($order->payment_type)
					@case('0')
					{{ __('pdf.invoice-method-card') }}
					@break

					@case('1')
					Paypal
					@break

					@case('2')
					Digicash
					@break

					@case('3')
					{{ __('pdf.invoice-bank-transfer') }}
					@break

					@case('4')
					{{ __('pdf.invoice-vouchers') }}
					@break

					@default
					{{ __('pdf.invoice-bak-transfer') }}
					@break
				@endswitch
			</p>
			<p style="position: absolute; width: 25%; top: 0; left: 75%;">
				<span style="font-family: 'Barlow Condensed SemiBold'; margin-bottom: 0px; padding-bottom: 0px;">
					{{ __('pdf.invoice-payment-status') }}
				</span>
				<br/>
				@if($order->payment_status >= '2')
				{{ __('pdf.invoice-paid') }}
				@else
				{{ __('pdf.invoice-payment-pending') }}
				@endif
			</p>
		</div>
		<div>
			<div style="position: relative; color: #27955B; font-family: 'Barlow Condensed SemiBold'; height: 30px; border-bottom: solid #27955B 1px;">
				<div style="position: absolute; width: 40%; top: 0; left: 0;">
					{{ __('pdf.invoice-article') }}
				</div>
				<div style="position: absolute; width: 15%; top: 0; left: 40%;">
					{{ __('pdf.invoice-unit-price-ht') }}
				</div>
				<div style="position: absolute; width: 15%; top: 0; left: 55%;">
					{{ __('pdf.invoice-vta-number') }}
				</div>
				<div style="position: absolute; width: 15%; top: 0; left: 70%;">
					{{ __('pdf.invoice-quantity') }}
				</div>
				<div style="position: absolute; width: 15%; top: 0; left: 85%;">
					{{ __('pdf.invoice-price-with-tax') }}
				</div>
			</div>
			@php $sum_before_voucher = 0; $sum_without_tax = 0; @endphp
			@foreach($order->cart->couture_variations as $article)
			@if($article->name == 'voucher')
				<div style="position: relative; font-family: 'Barlow Condensed Medium'; height: 26px; border-bottom: solid gray 1px;">
					<div style="position: absolute; width: 40%; top: 0; left: 0;">
						{{ __('pdf.invoice-voucher') }} - {{ __('pdf.invoice-voucher-type') }} @if($article->voucher_type == 'pdf') PDF @else {{ __('pdf.invoice-voucher-type-clothe') }} @endif
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 40%;">
						{{ round($article->pivot->value / (1 + 8/100), 2) }}&euro;
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 55%;">
						8%
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 70%;">
						{{ $article->pivot->articles_number }}
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 85%;">
						{{ number_format($article->pivot->value * $article->pivot->articles_number, 2) }}&euro;
					</div>
				</div>
				@php 
					$sum_before_voucher += $article->pivot->value * $article->pivot->articles_number; 
					$sum_without_tax += ($article->pivot->value / (1 + 8/100)) * $article->pivot->articles_number;
				@endphp
			@else
				<div style="position: relative; font-family: 'Barlow Condensed Medium'; height: 26px; border-bottom: solid gray 1px;">
					<div style="position: absolute; width: 40%; top: 0; left: 0;">
						{{ strtoupper($article->name) }}
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 40%;">
						{{ round($article->creation->price / (1 + $article->creation->tva_value/100), 2) }}&euro;
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 55%;">
						{{ $article->creation->tva_value }}%
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 70%;">
						{{ $article->pivot->articles_number }}
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 85%;">
						{{ number_format($article->creation->price * $article->pivot->articles_number, 2) }}&euro;
					</div>
					@php 
						$sum_before_voucher += $article->creation->price * $article->pivot->articles_number; 
						$sum_without_tax += ($article->creation->price / (1 + $article->creation->tva_value/100)) * $article->pivot->articles_number;
					@endphp
				</div>
				@if($article->pivot->with_extra_article)
				<div style="position: relative; font-family: 'Barlow Condensed Regular'; height: 26px; border-bottom: solid gray 1px;">
					<div style="position: absolute; width: 40%; top: 0; left: 0;">
						+ {{ __('pdf.invoice-aditionnal-pillow') }}
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 40%;">
						{{ round(10 / (1 + $article->creation->tva_value/100), 2) }}&euro;
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 55%;">
						{{ $article->creation->tva_value }}%
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 70%;">
						{{ $article->pivot->articles_number }}
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 85%;">
						{{ number_format(10 * $article->pivot->articles_number, 2) }}&euro;
					</div>
					@php 
						$sum_before_voucher += 10 * $article->pivot->articles_number; 
						$sum_without_tax += (10 / (1 + $article->creation->tva_value/100)) * $article->pivot->articles_number;
					@endphp
				</div>
				@endif
				@if($article->pivot->is_gift)
				<div style="position: relative; font-family: 'Barlow Condensed Regular'; height: 26px; border-bottom: solid gray 1px;">
					<div style="position: absolute; width: 40%; top: 0; left: 0;">
						+ {{ __('pdf.invoice-gift-wrap') }}
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 40%;">
						{{ round(($article->pivot->with_wrapping * 5 + $article->pivot->with_card * 3) / (1 + $article->creation->tva_value/100), 2) }}&euro;
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 55%;">
						{{ $article->creation->tva_value }}%
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 70%;">
						{{ $article->pivot->articles_number }}
					</div>
					<div style="position: absolute; width: 15%; top: 0; left: 85%;">
						{{ number_format(($article->pivot->with_wrapping * 5 + $article->pivot->with_card * 3) * $article->pivot->articles_number, 2) }}&euro;
					</div>
					@php 
						$sum_before_voucher += ($article->pivot->with_wrapping * 5 + $article->pivot->with_card * 3) * $article->pivot->articles_number; 
						$sum_without_tax += (($article->pivot->with_wrapping * 5 + $article->pivot->with_card * 3) / (1 + $article->creation->tva_value/100)) * $article->pivot->articles_number;
					@endphp
				</div>
				@endif
			@endif
			@endforeach

			<div style="position: relative; font-family: 'Barlow Condensed Regular'; height: 26px; border-bottom: solid gray 1px; width: 60%; margin-left: 40%;">
				<div style="position: absolute; width: 75%; top: 0; left: 0%; text-transform: uppercase;">
					{{ __('pdf.invoice-total') }}
				</div>
				<div style="position: absolute; width: 25%; top: 0; left: 75%;">
					{{ number_format($sum_before_voucher, 2) }}&euro;
				</div>
			</div>

			<div style="position: relative; font-family: 'Barlow Condensed Regular'; height: 26px; border-bottom: solid gray 1px; width: 60%; margin-left: 40%;">
				<div style="position: absolute; width: 75%; top: 0; left: 0%;">
					{{ __('pdf.invoice-included-vta') }}
				</div>
				<div style="position: absolute; width: 25%; top: 0; left: 75%;">
					{{ number_format($sum_before_voucher - $sum_without_tax, 2) }}&euro;
				</div>
			</div>

			<div style="position: relative; font-family: 'Barlow Condensed Regular'; height: 26px; border-bottom: solid gray 1px; width: 60%; margin-left: 40%;">
				<div style="position: absolute; width: 75%; top: 0; left: 0%;">
					{{ __('pdf.invoice-delivery-fees') }}
				</div>
				<div style="position: absolute; width: 25%; top: 0; left: 75%;">
					{{ number_format($delivery_cost, 2) }}&euro;
				</div>
			</div>

			@if(session('has_kulturpass') !== null)
			<div style="position: relative; font-family: 'Barlow Condensed Regular'; height: 26px; border-bottom: solid gray 1px; width: 60%; margin-left: 40%;">
				<div style="position: absolute; width: 75%; top: 0; left: 0%;">
					{{ __('pdf.invoice-kulturpass-discount') }}
				</div>
				<div style="position: absolute; width: 25%; top: 0; left: 75%;">
					-50%
				</div>
			</div>
			@endif

			@if($order->cart->use_voucher)
			<div style="position: relative; font-family: 'Barlow Condensed Regular'; height: 26px; border-bottom: solid gray 1px; width: 60%; margin-left: 40%;">
				<div style="position: absolute; width: 75%; top: 0; left: 0%; text-transform: uppercase;">
					{{ __('pdf.invoice-voucher-use') }}
				</div>
				@php $voucher_discount = $order->cart->price_before_voucher - $order->total_price; @endphp
				<div style="position: absolute; width: 25%; top: 0; left: 74%;">
					-{{ number_format($voucher_discount, 2) }}&euro;
				</div>
			</div>
			@else
				@php $voucher_discount = 0; @endphp
			@endif

			<div style="position: relative; font-family: 'Barlow Condensed Medium'; min-height: 40px; border-bottom: solid #27955B 2px; width: 60%; margin-left: 40%;">
				<div style="position: absolute; width: 75%; top: 0; left: 0%; padding-top: 10px; text-transform: uppercase;">
					{{ __('pdf.invoice-total-to-pay') }}
				</div>
				<div style="position: absolute; width: 25%; top: 0; left: 75%; padding-top: 10px;">
					@if($order->total_price == max(0, $sum_before_voucher + $delivery_cost - $voucher_discount))
					{{ number_format(max(0, $sum_before_voucher + $delivery_cost - $voucher_discount), 2) }}&euro;
					@else
					{{ number_format($order->total_price, 2) }}&euro;
					@endif
				</div>
			</div>

		</div>
	</div>
	<footer style="position: absolute; bottom: 0; left: 0; width: 100%; height: 30px; border-top: solid 1px lightgrey;">
		<p style="position: absolute; padding-top: 5px; left: 0; width: 50%;">
			<span style="font-family: 'Barlow Condensed SemiBold';">BENU VILLAGE ESCH ASBL</span> | RCS F11364 | TVA : LU 30223580
		</p>
		<p style="text-align: right; position: absolute; left: 50%; width: 50%;">
			IBAN | BCEELULL LU63 0019 5055 5246 0000
		</p>
	</footer>
</body>
</html>
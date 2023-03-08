<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Models\User;
use App\Mail\UserRegistered;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// In case of landing page activated (use 'landing' as APP_ENV), only the landing page is available from the root address

if (app('env') == 'oldlanding') {
	Route::get('/{slug}', function() {
		return redirect()->route('landing-fr');
	})->where('slug', '^([a-zA-Z0-9-]{3,})$');

	Route::get('/', function() {
		return redirect()->route('landing-fr');
	});

	Route::get('/fr', 'GeneralController@landingFr')->name('landing-fr');
	Route::get('/en', 'GeneralController@landingEn')->name('landing-en');
	Route::get('/de', 'GeneralController@landingDe')->name('landing-de');
	Route::get('/lu', 'GeneralController@landingLu')->name('landing-lu');
} else {
	// Home does not need URI translation. Any locale may land on this page, middleware will ensure locale is prepended to the URI.
	// Same for auth requests, no translation needed.
	// Dashboard is also common to everyone, due to several redirections that would need to be handled in the auth process

	Route::get('/{slug}', function() {
		return redirect()->route('home', ['locale' => 'en']);
	})->where('slug', '^([a-zA-Z0-9-]{3,})$');

	Route::group([
		'prefix' => '{locale?}',
		'middleware' => 'setlocale'], function() {
			Route::get('/', 'GeneralController@home')->name('home');
			// Route::get('/dashboard', 'UserController@show')->name('dashboard')->middleware('createcart');
			// Route::get('/dashboard/{any}', function() {
			// 	return redirect()->route('dashboard');
			// });
			// Route::post('/dashboard/addresses', 'UserController@addAddress')->name('dashboard.add-address');
			Route::post('/store-newsletter', 'GeneralController@storeNewsletter')->name('newsletter-subscribe');

			Route::post('/validate-stage-session', 'GeneralController@accessStage')->name('stage-access');
			
			//Auth routes
			require __DIR__.'/auth.php';
	});

	// All other routes to be localized, by language. Separated route groups for each locale allows same translations for URIs in different languages, since localized prefix will ensure route names are unique.
	Route::group([
		'prefix' => 'lu',
		'middleware' => 'setlocale'], function() {

		// Route::get('/'.trans("slugs.full-story", [], "lu"), 'GeneralController@showFullStory')->name('full-story-lu');
		// Route::get('/'.trans("slugs.about", [], "lu"), 'GeneralController@showAbout')->name('about-lu');
		// Route::get('/'.trans("slugs.partners", [], "lu"), 'GeneralController@showPartners')->name('partners-lu');
		// Route::get('/'.trans("slugs.vouchers", [], "lu"), 'GeneralController@showVouchers')->name('vouchers-lu')->middleware('createcart');
		// Route::get('/'.trans("slugs.news", [], "lu").'/{slug?}', 'GeneralController@showNews')->name('news-lu');

		Route::get('/test-landing-lu', 'GeneralController@landingLu')->name('landing-lu');

		// Route::get('/'.trans("slugs.cart", [], "lu"), 'SaleController@showCart')->name('cart-lu')->middleware('createcart');

		// Route::get('/'.trans("slugs.payment", [], "lu"), 'SaleController@showPayment')->name('payment-lu');

		// Route::get('/'.trans("slugs.process-payment", [], "lu").'/{order}', 'SaleController@cardPayment')->name('payment-request-lu');
		// Route::get('/'.trans("slugs.process-paypal-payment", [], "lu").'/{order}', 'SaleController@paypalPayment')->name('payment-request-paypal-lu');
		// Route::post('/'.trans("slugs.payment-by-card", [], "lu"), 'SaleController@payByCard')->name('payment-process-lu');
		// Route::get('/'.trans("slugs.payment-validation", [], "lu").'/{order}', 'SaleController@validatePayment')->name('payment-validate-lu');
		// Route::get('/'.trans("slugs.processed-payment", [], "lu").'/{order}', 'SaleController@showValidPayment')->name('payment-processed-lu');

		Route::get('/'.trans("slugs.newsletter-subscribe", [], "lu"), 'GeneralController@showNewsletter')->name('newsletter-lu');
		Route::get('/'.trans("slugs.newsletter-unsubscribe", [], "lu").'/{id}', 'GeneralController@cancelNewsletter')->name('newsletter-stop-lu');

		// Route::get('/'.trans("slugs.invoice", [], "lu").'/{order_code}', 'SaleController@displayInvoice')->name('invoice-lu');

		// Route::get('/'.trans("slugs.show-voucher", [], "lu").'/{voucher_code}', 'UserController@displayVoucher')->name('show-voucher-pdf-lu');

		Route::get('/'.trans("slugs.footer-legal-mentions", [], "lu"), 'GeneralController@footerLegal')->name('footer.legal-lu');
		Route::get('/'.trans("slugs.extra-infos", [], "lu"), 'GeneralController@showInfos')->name('extra-infos-lu');
	});

	Route::group([
		'prefix' => 'fr',
		'middleware' => ['setlocale', 'checkKulturpass'],
	], function() {
		// Route::get('/'.trans("slugs.client-support", [], "fr").'/{page?}', 'ContactController@showAll')->name('client-service-fr');
		// Route::get('/'.trans("slugs.full-story", [], "fr"), 'GeneralController@showFullStory')->name('full-story-fr');
		// Route::get('/'.trans("slugs.about", [], "fr"), 'GeneralController@showAbout')->name('about-fr');
		// Route::get('/'.trans("slugs.partners", [], "fr"), 'GeneralController@showPartners')->name('partners-fr');
		// Route::get('/'.trans("slugs.vouchers", [], "fr"), 'GeneralController@showVouchers')->name('vouchers-fr')->middleware('createcart');
		// Route::get('/'.trans("slugs.news", [], "fr").'/{slug?}', 'GeneralController@showNews')->name('news-fr');

		Route::get('/import-data', 'GeneralController@startImport');

		// // Test of the landing page
		Route::get('/test-landing', 'GeneralController@landingFr')->name('landing-fr');

		// Route::get('/'.trans("slugs.cart", [], "fr"), 'SaleController@showCart')->name('cart-fr')->middleware('createcart');

		// Route::get('/'.trans("slugs.payment", [], "fr"), 'SaleController@showPayment')->name('payment-fr');

		// Route::get('/paiement-par-carte/{order}', 'SaleController@cardPayment')->name('payment-request-fr');
		// Route::get('/paiement-par-paypal/{order}', 'SaleController@paypalPayment')->name('payment-request-paypal-fr');
		// Route::post('/paiement-par-carte', 'SaleController@payByCard')->name('payment-process-fr');
		// Route::get('/validation-paiement/{order}', 'SaleController@validatePayment')->name('payment-validate-fr');
		// Route::get('/paiement-valide/{order}', 'SaleController@showValidPayment')->name('payment-processed-fr');

		Route::get('/'.trans("slugs.newsletter-subscribe", [], "fr"), 'GeneralController@showNewsletter')->name('newsletter-fr');
		Route::get('/'.trans("slugs.newsletter-unsubscribe", [], "fr").'/{id}', 'GeneralController@cancelNewsletter')->name('newsletter-stop-fr');

		// Route::get('/test-mail', function() {
		// 	$user = User::find(2);

		// 	return new UserRegistered($user);
		// });

		// Route::get('/facture/{order_code}', 'SaleController@displayInvoice')->name('invoice-fr');
		// Route::get('/bon-d-achat/{voucher_code}', 'UserController@displayVoucher')->name('show-voucher-pdf-fr');

		Route::get('/'.trans("slugs.footer-legal-mentions", [], "fr"), 'GeneralController@footerLegal')->name('footer.legal-fr');
		Route::get('/'.trans("slugs.extra-infos", [], "fr"), 'GeneralController@showInfos')->name('extra-infos-fr');
	});

	Route::group([
		'prefix' => 'en',
		'middleware' => 'setlocale'], function() {
		// Route::get('/'.trans("slugs.client-support", [], "en").'/{page?}', 'ContactController@showAll')->name('client-service-en');
		// Route::get('/'.trans("slugs.full-story", [], "en"), 'GeneralController@showFullStory')->name('full-story-en');
		// Route::get('/'.trans("slugs.about", [], "en"), 'GeneralController@showAbout')->name('about-en');
		// Route::get('/'.trans("slugs.partners", [], "en"), 'GeneralController@showPartners')->name('partners-en');
		// Route::get('/'.trans("slugs.vouchers", [], "en"), 'GeneralController@showVouchers')->name('vouchers-en')->middleware('createcart');
		// Route::get('/'.trans("slugs.news", [], "en").'/{slug?}', 'GeneralController@showNews')->name('news-en');

		Route::get('/test-landing-en', 'GeneralController@landingEn')->name('landing-en');

		// Route::get('/'.trans("slugs.cart", [], "en"), 'SaleController@showCart')->name('cart-en')->middleware('createcart');

		// Route::get('/'.trans("slugs.payment", [], "en"), 'SaleController@showPayment')->name('payment-en');

		// Route::get('/'.trans("slugs.process-payment", [], "en").'/{order}', 'SaleController@cardPayment')->name('payment-request-en');
		// Route::get('/'.trans("slugs.process-paypal-payment", [], "en").'/{order}', 'SaleController@paypalPayment')->name('payment-request-paypal-en');
		// Route::post('/'.trans("slugs.payment-by-card", [], "en"), 'SaleController@payByCard')->name('payment-process-en');
		// Route::get('/'.trans("slugs.payment-validation", [], "en").'/{order}', 'SaleController@validatePayment')->name('payment-validate-en');
		// Route::get('/'.trans("slugs.processed-payment", [], "en").'/{order}', 'SaleController@showValidPayment')->name('payment-processed-en');

		Route::get('/'.trans("slugs.newsletter-subscribe", [], "en"), 'GeneralController@showNewsletter')->name('newsletter-en');
		Route::get('/'.trans("slugs.newsletter-unsubscribe", [], "en").'/{id}', 'GeneralController@cancelNewsletter')->name('newsletter-stop-en');

		// Route::get('/'.trans("slugs.invoice", [], "en").'/{order_code}', 'SaleController@displayInvoice')->name('invoice-en');

		// Route::get('/'.trans("slugs.show-voucher", [], "en").'/{voucher_code}', 'UserController@displayVoucher')->name('show-voucher-pdf-en');

		Route::get('/'.trans("slugs.footer-legal-mentions", [], "en"), 'GeneralController@footerLegal')->name('footer.legal-en');
		Route::get('/'.trans("slugs.extra-infos", [], "en"), 'GeneralController@showInfos')->name('extra-infos-en');
	});

	Route::group([
		'prefix' => 'de',
		'middleware' => 'setlocale'], function() {
		// Route::get('/'.trans("slugs.client-support", [], "de").'/{page?}', 'ContactController@showAll')->name('client-service-de');
		// Route::get('/'.trans("slugs.full-story", [], "de"), 'GeneralController@showFullStory')->name('full-story-de');
		// Route::get('/'.trans("slugs.about", [], "de"), 'GeneralController@showAbout')->name('about-de');
		// Route::get('/'.trans("slugs.partners", [], "de"), 'GeneralController@showPartners')->name('partners-de');
		// Route::get('/'.trans("slugs.vouchers", [], "de"), 'GeneralController@showVouchers')->name('vouchers-de')->middleware('createcart');
		// Route::get('/'.trans("slugs.news", [], "de").'/{slug?}', 'GeneralController@showNews')->name('news-de');

		Route::get('/test-landing-de', 'GeneralController@landingDe')->name('landing-de');

		// Route::get('/'.trans("slugs.cart", [], "de"), 'SaleController@showCart')->name('cart-de')->middleware('createcart');

		// Route::get('/'.trans("slugs.payment", [], "de"), 'SaleController@showPayment')->name('payment-de');

		// Route::get('/'.trans("slugs.process-payment", [], "de").'/{order}', 'SaleController@cardPayment')->name('payment-request-de');
		// Route::get('/'.trans("slugs.process-paypal-payment", [], "de").'/{order}', 'SaleController@paypalPayment')->name('payment-request-paypal-de');
		// Route::post('/'.trans("slugs.payment-by-card", [], "de"), 'SaleController@payByCard')->name('payment-process-de');
		// Route::get('/'.trans("slugs.payment-validation", [], "de").'/{order}', 'SaleController@validatePayment')->name('payment-validate-de');
		// Route::get('/'.trans("slugs.processed-payment", [], "en").'/{order}', 'SaleController@showValidPayment')->name('payment-processed-de');

		Route::get('/'.trans("slugs.newsletter-subscribe", [], "de"), 'GeneralController@showNewsletter')->name('newsletter-de');
		Route::get('/'.trans("slugs.newsletter-unsubscribe", [], "de").'/{id}', 'GeneralController@cancelNewsletter')->name('newsletter-stop-de');

		// Route::get('/'.trans("slugs.invoice", [], "de").'/{order_code}', 'SaleController@displayInvoice')->name('invoice-de');

		// Route::get('/'.trans("slugs.show-voucher", [], "de").'/{voucher_code}', 'UserController@displayVoucher')->name('show-voucher-pdf-de');

		Route::get('/'.trans("slugs.footer-legal-mentions", [], "de"), 'GeneralController@footerLegal')->name('footer.legal-de');
		Route::get('/'.trans("slugs.extra-infos", [], "de"), 'GeneralController@showInfos')->name('extra-infos-de');
	});

	// Route::group([
	// 	'middleware' => 'setlocale'], function() {
	// 	Route::get('/{slug?}', 'GeneralController@home')->where('slug', '[a-zA-Z0-9]{3,}');
	// });
}
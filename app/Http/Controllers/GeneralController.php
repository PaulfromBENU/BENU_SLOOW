<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Article;
use App\Models\Creation;
use App\Models\CreationCategory;
use App\Models\NewsArticle;
use App\Models\Partner;
use App\Models\User;
use App\Mail\NewsletterConfirmation;
use App\Mail\NewsletterConfirmationForAdmin;

use App\Traits\DataImporter;

use App\Http\Requests\NewsletterRequest;

class GeneralController extends Controller
{
    use DataImporter;

    public function home()
    {
        return view('welcome');
    }

    public function landingFr()
    {
        return view('landing-fr');
    }

    public function landingEn()
    {
        return view('landing-en');
    }

    public function landingDe()
    {
        return view('landing-de');
    }

    public function landingLu()
    {
        return view('landing-lu');
    }

    public function showFullStory()
    {
        return view('full-story');
    }

    public function showAbout()
    {
        return view('about');
    }

    public function showPartners()
    {
        $partners = Partner::orderBy('created_at', 'desc')->get();
        $localized_desc_query = "description_".app()->getLocale();
        return view('partners', ['partners' => $partners, 'desc_query' => $localized_desc_query]);
    }

    public function showVouchers()
    {
        $vouchers = Article::where('name', 'voucher')->orderBy('voucher_type', 'asc')->get();

        return view('vouchers', ['vouchers' => $vouchers]);
    }

    public function showNews(string $slug = '')
    {
        if ($slug == '') {
            $all_news = NewsArticle::where('is_ready', '1')->orderBy('updated_at', 'desc')->get();
            return view('news', ['all_news' => $all_news]);
        }

        if (NewsArticle::where('slug_'.app()->getLocale(), $slug)->count() > 0) {
            $news = NewsArticle::where('slug_'.app()->getLocale(), $slug)->first();
            $previous_news = NewsArticle::where('created_at', '>', $news->created_at)
                                          ->where('is_ready', '1')
                                          ->orderBy('created_at', 'asc')
                                          ->first();
            $next_news = NewsArticle::where('created_at', '<', $news->created_at)
                                      ->where('is_ready', '1')
                                      ->orderBy('created_at', 'desc')
                                      ->first();
            return view('news-single', ['news' => $news, 'previous_news' => $previous_news, 'next_news' => $next_news]);
        }

        return redirect()->route('news-'.app()->getLocale());
    }

    public function startImport()
    {
        if(auth::check() && auth::user()->role == 'admin') {
            set_time_limit(3600);
            // Article::query()->update(['checked' => '1']);
            // echo "*** Importation started...<br/>";
            // $this->importDataFromSophie();
            // $this->importCreationsFromLou();
            // $this->importCreationsFromSabine();
            // $this->createArticlesFromPictures();
            // $this->updateArticlesFromLouAndSophie();
            $this->importTranslations();
        } else {
            return redirect()->route('login-fr');
        }
    }

    public function showNewsletter()
    {
        return view('newsletter');
    }

    public function storeNewsletter(NewsletterRequest $request)
    {
        $message = "";
        if (auth()->check()) {
            if (auth()->user()->newsletter == '1') {
                auth()->user()->newsletter = 0;
                auth()->user()->save();
                $message = __('auth.newsletter-unsubscribe-confirm');
            } else {
                auth()->user()->newsletter = 1;
                auth()->user()->save();
                $message = __('auth.newsletter-subscribe-confirm');
                Mail::to($auth()->user()->email)->send(new NewsletterConfirmation());
                Mail::to(env('MAIL_TO_ADMIN_ADDRESS'))->send(new NewsletterConfirmationForAdmin($auth()->user()));
            }
        } else {
            if (User::where('email', $request->newsletter_email)->count() > 0) {
                $user = User::where('email', $request->newsletter_email)->first();
                $user->newsletter = 1;
                $user->save();
                $message = __('auth.newsletter-subscribe-confirm');
                Mail::to($user->email)->send(new NewsletterConfirmation());
                Mail::to(env('MAIL_TO_ADMIN_ADDRESS'))->send(new NewsletterConfirmationForAdmin($user));
            } else {
                $user = new User();
                $user->email = $request->newsletter_email;
                $client_number = "C".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
                while (User::where('client_number', $client_number)->count() > 0) {
                    $client_number = "C".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
                }

                $user->client_number = $client_number;
                $user->first_name = $request->newsletter_first_name;
                $user->last_name = $request->newsletter_last_name;
                $user->newsletter = 1;
                $user->general_comment = "";
                if($user->save()) {
                    $message = __('auth.newsletter-subscribe-confirm');
                    Mail::to($user->email)->send(new NewsletterConfirmation());
                    Mail::to(env('MAIL_TO_ADMIN_ADDRESS'))->send(new NewsletterConfirmationForAdmin($user));
                }
            }
        }

        return redirect()->route('newsletter-'.session('locale'))->with('success', $message);

    }

    public function footerLegal()
    {
        return view('footer.pages.legal');
    }
}

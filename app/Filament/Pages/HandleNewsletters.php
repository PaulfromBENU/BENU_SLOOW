<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Models\User;

use App\Jobs\SendNewsletterConfirmation;
use App\Jobs\SendNewsletterCancellation;

class HandleNewsletters extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-mail';

    protected static string $view = 'filament.pages.handle-newsletters';

    protected static ?string $title = 'Handle newsletter requests';
 
    protected static ?string $navigationLabel = 'Newsletters';
     
    protected static ?string $slug = 'handle-newsletters';

    protected static ?string $navigationGroup = 'Users';

    protected static ?int $navigationSort = 5;

    public $pending_users;
    public $subscribed_users;

    public function mount()
    {
        $this->updateUsers();
    }

    public function updateUsers()
    {
        $this->pending_users = User::where('newsletter', '1')->get();
        $this->subscribed_users = User::where('newsletter', '2')->get();
    }

    public function validateNewsletter(int $user_id)
    {
        if (User::find($user_id)) {
            $user = User::find($user_id);
            $user->newsletter = 2;
             // 1 = newsletter requested, 2 = newletter confirmed
            if ($user->save()) {
                // Dispatch here
                SendNewsletterConfirmation::dispatchAfterResponse($user);
                $this->updateUsers();
            }
        }
    }

    public function cancelNewsletter(int $user_id)
    {
        if (User::find($user_id)) {
            $user = User::find($user_id);
            $user->newsletter = 0;
            SendNewsletterCancellation::dispatchAfterResponse($user);
            if ($user->role == 'newsletter') {
                $user->forceDelete();
            } else {
                $user->save();
            }
            $this->updateUsers();
        }
    }
}

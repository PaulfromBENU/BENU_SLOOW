<?php

use App\Models\Translation;

/*
|--------------------------------------------------------------------------
| Authentication Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used during authentication for various
| messages that we need to display to the user. You are free to modify
| these language lines according to your application's requirements.
|
*/

$emails_translations = Translation::where('page', 'emails')->get();
$translations_array = [];

foreach ($emails_translations as $translation) {
    $translations_array[$translation->key] = $translation->fr;
}

return $translations_array;

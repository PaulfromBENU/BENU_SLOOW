<?php

use App\Models\Translation;

/*
|--------------------------------------------------------------------------
| Footer infos Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used during authentication for various
| messages that we need to display to the user. You are free to modify
| these language lines according to your application's requirements.
|
*/

$infos_translations = Translation::where('page', 'infos')->get();
$translations_array = [];

foreach ($infos_translations as $translation) {
    $translations_array[$translation->key] = $translation->en;
}

return $translations_array;

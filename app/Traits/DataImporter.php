<?php

namespace App\Traits;

//use Illuminate\Support\Facades\Storage;

use App\Models\Translation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use Intervention\Image\Facades\Image;

trait DataImporter {

    public function importTranslations()
    {
        // !! THIS FUNCTION SHOULD ONLY BE RUN AFTER SEEDING THE TRANSLATIONS TABLE WITH THE SEEDER (OTHERWISE SLUGS NOT INCLUDED)
        $raw_translations = json_decode(file_get_contents(asset('json_imports/translations.json')), true);

        echo "<br/><br/><strong>----------------  Importing translations from Sophie's file...</strong><br/>";

        foreach ($raw_translations as $translation) {
            $page = strtolower(explode(".", $translation['key'])[0]);
            $key = strtolower(explode(".", $translation['key'])[1]);

            $path = public_path('../resources/lang/fr/'.$page.'.php');
            if (!File::exists($path)) {
                echo "<span style='color: red;'> !!! Missing translation page for ".$page."</span><br/>";
            }

            if (Translation::where('page', $page)->where('key', $key)->count() > 0) {
                // Case translation key is found in the database
                $updated_translation = Translation::where('page', $page)->where('key', $key)->first();
                if (strpos($translation['fr'], '> lien') !== false || strpos($translation['fr'], '> link') !== false) {
                    echo "Lien à mettre à jour dans le code pour ".$translation['key'].'<br/>';
                } 

                // Import only if translation exists
                if ($translation['fr'] != "") {
                    $updated_translation->fr = $translation['fr'];
                } else {
                    echo "<span style='color: red;'> >>> Translation missing in JSON for ".$page.'.'.$key." in language FR</span><br/>";
                }
                if ($translation['en'] != "") {
                    $updated_translation->en = $translation['en'];
                } else {
                    echo "<span style='color: red;'> >>> Translation missing in JSON for ".$page.'.'.$key." in language EN</span><br/>";
                }
                // if ($translation['de'] != "") {
                //     $updated_translation->de = $translation['de'];
                // } else {
                //     echo "<span style='color: red;'> >>> Translation missing in JSON for ".$page.'.'.$key." in language DE</span><br/>";
                // }
                $translation['de'] = $page.'.'.$key;

                if ($translation['lu'] != "") {
                    $updated_translation->lu = $translation['lu'];
                } else {
                    echo "<span style='color: red;'> >>> Translation missing in JSON for ".$page.'.'.$key." in language LU</span><br/>";
                }
                
                $updated_translation->translation_key = $translation['key'];
                if ($updated_translation->save()) {
                    echo "<span style='color: green; padding-left: 10px;'>Translation updated in database for ".$page.'.'.$key.", value in French is </span>".$translation['fr']."<br/>";
                }
            } else {
                // Handle translations persisted in database outside of the Translation table
                // Includes colors, types, categories, shops description
                if ($page == 'services' && strpos($key, 'faq-group') !== false) {
                    $new_faq_info = new Translation();
                    $new_faq_info->page = $page;
                    $new_faq_info->key = $key;
                    $new_faq_info->fr = $translation['fr'];
                    $new_faq_info->en = $translation['en'];
                    $new_faq_info->lu = $translation['lu'];
                    $new_faq_info->de = $translation['de'];
                    $new_faq_info->translation_key = $page.'.'.$key;
                    if ($new_faq_info->save()) {
                        echo "<span style='color: green; padding-left: 10px;'>New element ".$key." added in FAQ</span><br/>";
                    }
                } else {
                    // Case not found at all, create new translation
                    $new_translation = new Translation();
                    $new_translation->page = $page;
                    $new_translation->key = $key;
                    $new_translation->fr = $translation['fr'];
                    $new_translation->lu = $translation['lu'];
                    $new_translation->de = $page.'.'.$key;;
                    $new_translation->en = $translation['en'];
                    $new_translation->translation_key = $page.'.'.$key;
                    if ($new_translation->save()) {
                        echo "<span style='color: green; padding-left: 10px;'>New element ".$page.'.'.$key." added in the database</span><br/>";
                    } else {
                        echo "<span style='color: red;'>*** Not found in Translation database: ".$page.'.'.$key."</span><br/>";
                    }
                }
            }
        }
    }

}
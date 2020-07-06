<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function configureTheme()
    {
        $shop = Auth::user();

        $themes = $shop->api()->rest('GET', '/admin/themes.json');

        // get active theme id
        $activeThemeId = "";
        foreach($themes['body']->container['themes'] as $theme){
            if($theme['role'] == "main"){
                $activeThemeId = $theme['id'];
            }
        }

        $snippet = "Your snippet code updated updated updated";

        // Data to pass to our rest api request
        $array = array('asset' => array('key' => 'snippets/codeinspire-wishlist-app.liquid', 'value' => $snippet));

        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

        // save data into database

        Setting::updateOrCreate(
            ['shop_id' => $shop->name ],
            ['activated' => true]
        );

        return ['message' => 'Theme setup succesfully'];

    }
}

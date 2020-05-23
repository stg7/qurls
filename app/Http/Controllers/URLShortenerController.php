<?php

namespace App\Http\Controllers;

use App\UrlMapping;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class URLShortenerController extends Controller
{
    //

    public function shorten(Request $request)
    {

        Validator::make($request->all(), [
            'url-to-shorten' => 'required|url',
        ])->validate("post");

        $url_mapping = new UrlMapping;

        $url_mapping->url = $request->input('url-to-shorten');

        $url_mapping->shortcut = hash('crc32', $url_mapping->url);

        $url_mapping->save();

        return view('shortenurl', [
            "url_mapping" => $url_mapping
        ]);
    }

}

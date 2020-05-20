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

        // $validatedData = $request->validate([
        //     'url-to-shorten' => 'required|max:2',
        // ]);
        //

        // $validator = Validator::make($request->all(), [
        //     'url-to-shorten' => 'required'
        // ])

        // $validator->after(function ($validator) {
        //     if (filter_var($request->input('url-to-shorten'), FILTER_VALIDATE_URL)) {
        //         $validator->errors()->add('url-to-shorten', 'not a valid url');
        //     }

        // });

        // if ($validator->fails()) {
        //     //

        //     return redirect('/')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }



        $url_mapping = new UrlMapping;

        $url_mapping->url = $request->input('url-to-shorten');

        $url_mapping->shortcut = hash('crc32', $url_mapping->url);

        $url_mapping->save();

        return view('shortenurl', [
            "url_mapping" => $url_mapping
        ]);
    }

}

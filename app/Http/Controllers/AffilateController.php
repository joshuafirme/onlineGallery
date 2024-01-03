<?php

namespace App\Http\Controllers;

use App\Helper\Utils;
use App\Http\Requests\AffiliateRequest;
use App\Mail\AffiliateMail;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Mail;
use Str;

class AffilateController extends Controller
{
    public function index()
    {
        $path = "content/web_content.json";

        $affiliate = Utils::readStorage($path, 'affiliate');

        return view('users.affiliate', compact('affiliate'));
    }

    public function registration()
    {
        return view('users.affiliate-registration');
    }

    public function doRegister(AffiliateRequest $request)
    {
        $request->validated();

        $recaptcha_token = request()->token;

        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => '6Lch7EMpAAAAAIrJoEZYsHaCdYPUW6UMsUNBnLPc',
            'response' => $recaptcha_token
        ];

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => "POST",
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $json_response = file_get_contents($url, false, $context);

        $result = json_decode($json_response, true);

        if ($result['success'] == false) {
            return redirect()->back()->with('danger', 'Recaptcha token is invalid, please reload this page and try again.');
        }

        $data = $request->all();
        $data['uuid'] = Str::uuid();

        $affiliate = Affiliate::create($data);

        Mail::to($affiliate->email)
            ->send(
                new AffiliateMail(
                    "Welcome to Make It Memories Affiliate Program",
                    $affiliate,
                    'emails.affiliate-registration'
                )
            );

        return redirect()->back()->with('success', 'Registration success and an email confirmation has been sent to your email.');
    }
}

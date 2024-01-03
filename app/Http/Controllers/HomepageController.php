<?php

namespace App\Http\Controllers;

use App\Helper\Utils;
use App\Models\Affiliate;
use App\Models\Uses;
use App\Models\UsesSlider;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Slider;
use App\Models\Card;
use App\Models\Testimonial;
use Storage;

class HomepageController extends Controller
{
    public function indexHomepage(string $account_name = null)
    {
        $affiliate = null;

        if ($account_name) {
            
            $affiliate = Affiliate::where('account_name', $account_name)->first();
    
            if ($affiliate) {
                session()->put('affiliate_uuid', $affiliate->uuid);
            }
            else {
                return view('users.pages.403');
            }
        }
        
        $sliders = Slider::get();
        $cards = Card::get();
        $testimonials = Testimonial::get();

        $path = "content/web_content.json";
        $why_choose_us = Utils::readStorage($path, 'why_choose_us');

        return view('/users/homepage', compact('sliders', 'cards', 'testimonials', 'why_choose_us', 'affiliate'));
    }

    public function uses($slug)
    {
        $uses = Uses::where('name', Utils::decodeSlug($slug, '-'))->first();

        $uses_slider = UsesSlider::where('uses_id', $uses->id)->get();

        return view('/users/uses', compact('uses', 'uses_slider'));
    }

    public function freeTrial()
    {
        $testimonials = Testimonial::get();

        $path = "content/web_content.json";

        $free_trial_guide = Utils::readStorage($path, 'free_trial_guide');

        return view('/users/public/freeTrial', compact('free_trial_guide', 'testimonials'));
    }

    public function howItWorks()
    {
        $path = "content/web_content.json";
        $how_it_works = Utils::readStorage($path, 'how_it_works');

        return view('/users/howitworks', compact('how_it_works'));
    }

    public function storeMessage(Request $request)
    {
        $contact = new Message();
        $contact->message = $request->input('message');

        $contact->save();

        return redirect('/homepage')->with('success', 'Your message has been sent successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class HomepageController extends Controller
{
    public function indexHomepage()
    {
        return view('/users/homepage', []);
    }

    public function weddingUses()
    {
        return view('/users/eventsUse/wedding', []);
    }

    public function holidaysUses()
    {
        return view('/users/eventsUse/holidays', []);
    }

    public function birthdaysUses()
    {
        return view('/users/eventsUse/birthdays', []);
    }

    public function corporatesUses()
    {
        return view('/users/eventsUse/corporates', []);
    }

    public function christmasUses()
    {
        return view('/users/eventsUse/christmas', []);
    }

    public function celebrationsUses()
    {
        return view('/users/eventsUse/celebrations', []);
    }

    public function freeTrial()
    {
        return view('/users/public/freeTrial', []);
    }

    public function howItWorks()
    {
        return view('/users/howitworks', []);
    }

    public function storeMessage(Request $request)
    {
        $contact = new Message();
        $contact->message = $request->input('message');

        $contact->save();

        return redirect('/homepage')->with('success', 'Your message has been sent successfully.');
    }
}

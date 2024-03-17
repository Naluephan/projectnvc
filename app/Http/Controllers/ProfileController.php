<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileMenu()
    {
        return view('profile_menu');
    }

    public function profileProfile()
    {
        return view('profile.profile');
    }

    public function profileHonor()
    {
        return view('profile.honor');
    }

    public function profileEntryandexit()
    {
        return view('profile.entryandexit');
    }

    public function profilePrivatecar()
    {
        return view('profile.privatecar');
    }

    public function profileSalary()
    {
        return view('profile.salary');
    }

    public function profileDocument()
    {
        return view('profile.document');
    }

    public function profileLoginorganicsplus()
    {
        return view('profile.loginorganicsplus');
    }

    public function profileTransactionhistory()
    {
        return view('profile.transactionhistory');
    }

    public function profileEquipment()
    {
        return view('profile.equipment');
    }

    public function profileHoliday()
    {
        return view('profile.holiday');
    }

    public function profileSocialsecurity()
    {
        return view('profile.socialsecurity');
    }

    public function profileOrganicscoins()
    {
        return view('profile.organicscoins');
    }

    public function profileSavings()
    {
        return view('profile.savings');
    }

    public function profileReservefund()
    {
        return view('profile.reservefund');
    }

    public function profileGroupinsurance()
    {
        return view('profile.groupinsurance');
    }

    public function profileOrganicshero()
    {
        return view('profile.organicshero');
    }

    public function profileOrganicsmaintenance()
    {
        return view('profile.organicsmaintenance');
    }

    public function profileComment()
    {
        return view('profile.comment');
    }
}

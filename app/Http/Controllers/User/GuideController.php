<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GuideController extends Controller
{

    function index()
    {
        return Inertia::render('User/Guides');
    }

    function casual()
    {
    	return Inertia::render('User/Guide/Casual');
    }

    function gamer()
    {
    	return Inertia::render('User/Guide/Gamer');
    }

    function work()
    {
    	return Inertia::render('User/Guide/Work');
    }

    function step1()
    {
        return Inertia::render('User/Guide/Step1');
    }

    function step2()
    {
        return Inertia::render('User/Guide/Step2');
    }

    function step3()
    {
        return Inertia::render('User/Guide/Step3');
    }

    function step4()
    {
        return Inertia::render('User/Guide/Step4');
    }

    function step5()
    {
        return Inertia::render('User/Guide/Step5');
    }


}

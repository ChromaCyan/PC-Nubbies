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

    function step2()
    {
        return Inertia::render('User/Guide/Step2');
    }
}

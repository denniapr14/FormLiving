<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    //

// =============================== NAVBAR
    public function index()
    {
        return view('home');
    }

    public function housing()
    {
        return view('housing');
    }

// ===========================================================



// ===================== OPTIONAL ============================
    public function MyCart()
    {
        return view('mycart');
        # code...
    }

    public function Cluster()
    {
        return view('cluster');
        # code...
    }



// ======================- END OPTIONAL -=====================


// =======================- SIMULATION -======================

    public function SimCluster()
    {
        return view('simCluster');
        # code...
    }

    public function SimSelectUnit()
    {
        return view('simSelectUnit');
        # code...
    }

    public function SimType()
    {
        return view('simType');
        # code...
    }

    public function SimModif()
    {
        return view('simModification');
        # code...
    }

    public function SimPayment()
    {
        return view('simPayment');
        # code...
    }

    public function SimPrice()
    {
        return view('simPrice');
        # code...
    }

    public function SimOrder()
    {
        return view('simOrder');
        # code...
    }

    public function SimSummary()
    {
        return view('simSummary');
        # code...
    }





// =================- END SIMULATION -========================


// ======================= FOOTER ============================

    public function Privacy()
    {
        return view('privacy');
    }

    public function Terms()
    {
        return view('terms');
    }

// ======================= END FOOTER ========================

}
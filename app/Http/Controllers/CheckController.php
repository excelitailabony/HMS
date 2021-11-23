<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    //
    public function Chartjs(){
        $Events = array
                  (
                    "0" => array
                              (
                               "title" => "Evefbgfgnt One",
                               "start" => "2018-10-31",
                               ),
                    "1" => array
                               (
                                "title" => "Event Two",
                                "start" => "2018-11-01",
                                )
                  );
        return view('fullcalendar',['Events' => $Events]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class WebcamController extends Controller
{
    public function index()
    {

        // Get the current date
        $currentDate = new \DateTime('now');

        // Add 2 years to the current date
        $futureDate = $currentDate->add(new \DateInterval('P3Y'));
        // Calculate the date range
        $rangeStart = new \DateTime('May , 2024');
        $rangeEnd = $futureDate;

        // Generate dropdown options for months in the date range
        $options = [];
        while ($rangeStart <= $rangeEnd) {
            $options[$rangeStart->format('M Y')] = $rangeStart->format('M Y');
            $rangeStart->modify('+1 month');
        }

        return view('Camera_Open.webcam');
    }

    public function store(Request $request)
    {
        $img = $request->image;
        $folderPath = "uploads/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        dd('Image uploaded successfully: ' . $fileName);
    }
}

<?php

namespace App\Http\Controllers;

use App\TestTaker;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index() {
        return view('upload');
    }

    public function storeCSV(Request $request) {
        //get the file
        $upload = $request->file('file');
        $file_path = $upload->getRealPath();

        //open, read and get header
        $file = fopen($file_path, 'r');
        $header = fgetcsv($file);

        //validation
        $escaped_header = [];
        // accept only letters as header fields
        foreach ($header as $key => $value) {
            $escapedItem=preg_replace('/[^a-z]/i', '', $value);
            array_push($escaped_header, $escapedItem);
        }

        //  0 => "1" id
        //  1 => "64-465-6944" testTaker
        //  2 => "54" correctAnswers
        //  3 => "90"   incorrectAnswers
        //upload
        while($rows = fgetcsv($file)) {
            // a feladat nem írta hogy lenne sketcy sor a csv fileban szóval bízok benne, hogy nincs, minthogy ne vegyek fel minden elemet
            $testTaker = new TestTaker();
            $testTaker->testTaker = $rows[1];
            $testTaker->correctAnswers = $rows[2];
            $testTaker->incorrectAnswers = $rows[3];
            $testTaker->save();
        }

        return redirect('/');
    }
}

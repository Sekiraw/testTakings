<?php

namespace App\Http\Controllers;

use App\TestTaker;
use Illuminate\Http\Request;

class TestTakerController extends Controller
{
    public function index(){
        return view('show');
    }

    public function getMembers(){
        $testTakers = TestTaker::all();

        return view('testtakerlist', compact('testTakers'));
    }

    public function save(Request $request){
        if ($request->ajax()){
            $testTaker = new TestTaker();
            $testTaker->testTaker = $request->testTaker;
            $testTaker->correctAnswers = $request->correctAnswers;
            $testTaker->incorrectAnswers = $request->incorrectAnswers;

            $testTaker->save();

            return response($testTaker);
        }
    }

    public function delete(Request $request){
        if ($request->ajax()){
            TestTaker::destroy($request->id);
        }
    }

    public function update(Request $request){
        if ($request->ajax()){
            $testTaker = TestTaker::where('id', $request->id)->first();
            if(isset($request->testTaker))
                $testTaker->testTaker = $request->testTaker;
            if(isset($request->correctAnswers))
                $testTaker->correctAnswers = $request->correctAnswers;
            if(isset($request->incorrectAnswers))
                $testTaker->incorrectAnswers = $request->incorrectAnswers;


            $testTaker->update();
            return response($testTaker);
        }
    }
}

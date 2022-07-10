<?php

namespace App\Http\Controllers;

use App\TestTaker;
use Illuminate\Http\Request;

class TestTakerController extends Controller
{
    public function index(){
        return view('show');
    }

    public function diagram_view() {
        $testTakerData = TestTaker::all();
        $correct = 0;
        $incorrect = 0;
        foreach ($testTakerData as $testTaker) {
            $correct += $testTaker->correctAnswers;
            $incorrect += $testTaker->incorrectAnswers;
        }

        return view('diagram', [
            'correct' => $correct,
            'incorrect' => $incorrect
        ]);
    }

    public function test_taker_view($testTaker) {
        $testTakerObj = TestTaker::where('testTaker', $testTaker)->first();

        return view('test-taker', [
            'testTaker' => $testTakerObj
        ]);
    }

    public function getMembers(){
        $testTakers = TestTaker::all();

        return view('testtakerlist', compact('testTakers'));
    }

    public function save(Request $request){
        if ($request->ajax()){
            // Validator -> vissza nem jelez de legalabb mukodik
            $validator = $request->validate([
                'testTaker' => 'required',
                'correctAnswers' => 'required|integer',
                'incorrectAnswers' => 'required|integer'
            ]);

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

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
        $correct = TestTaker::sum('correctAnswers');
        $incorrect = TestTaker::sum('incorrectAnswers');

        // found a way faster solution ^
        // calculate the correct and incorrect answers in the whole table
//        $correct = 0;
//        $incorrect = 0;
//        foreach ($testTakerData as $testTaker) {
//            $correct += $testTaker->correctAnswers;
//            $incorrect += $testTaker->incorrectAnswers;
//        }

        return view('diagram', [
            'correct' => $correct,
            'incorrect' => $incorrect
        ]);
    }

    public function test_taker_view($testTaker) {
        // where helyett all()->where mert lara collection kell nem query builder
        $testTakers = TestTaker::all()->where('testTaker', $testTaker);

        return view('test-taker', [
            'testTakers' => $testTakers,
            'testTakerID' => $testTaker
        ]);
    }

    public function getTestTakers(){
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

            // if set, validate then overwrite
            if(isset($request->correctAnswers))
            {
                $validator = $request->validate([
                    'correctAnswers' => 'integer'
                ]);
                $testTaker->correctAnswers = $request->correctAnswers;
            }
            if(isset($request->incorrectAnswers)) {
                $validator = $request->validate([
                    'incorrectAnswers' => 'integer'
                ]);
                $testTaker->incorrectAnswers = $request->incorrectAnswers;
            }

            $testTaker->update();
            return response($testTaker);
        }
    }

    // removable
    public function lore() {
        return '
            <h1>Lore</h1>
            <p>
                Megkaptam a feladatot, gyors átfutottam és hozzá is láttam, összes útvonal, controllerek és functionok kész is lettek gyorsan.
            </p>
            <p>
                Elgondolkozok, ránézek már, hogy tényleg ilyen egyszerű lenne-e ez a feladat? Átolvasom a feladatot újra mire meglátok egy bekezdést ami eddig elkerülte a figyelmemet.
            </p>
            <p><strong>
                Az adatműveletek során elvárás, hogy az oldal ne töltődjön újra (Ajax technológia
használata)
            </strong></p>
            <p>
                Kész a diagram, feltöltés, backend, most mit csináljak?
                Átmásoltam aminek volt haszna és kidobtam az egészet. Megcsináltam az ajaxot és már nem volt mit verziókövetni.
            </p>
            <p>
                Ez lenne a verziókövetés, avagy annak hiányának rövid története.
            </p>
            <p>
                <a href="/">Vissza</a>
            </p>
        ';
    }
}

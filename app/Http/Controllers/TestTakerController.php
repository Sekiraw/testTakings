<?php

namespace App\Http\Controllers;

use App\Rules\NameFormat;
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

    public function getTestTakers(){
        $testTakers = TestTaker::all();

        return view('testtakerlist', compact('testTakers'));
    }

    public function save(Request $request){
        if ($request->ajax()){
            // Validator
            $validator = $request->validate([
                'testTaker' => [
                    'required',
                    // custom pipe (rule)
                    new NameFormat()
                ],
                'correctAnswers' => 'required|integer|min:0',
                'incorrectAnswers' => 'required|integer|min:0'
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
            if(isset($request->testTaker)) {
                $validator = $request->validate([
                    'testTaker' => [
                        new NameFormat()
                    ]
                ]);
                $testTaker->testTaker = $request->testTaker;
            }
            if(isset($request->correctAnswers))
            {
                $validator = $request->validate([
                    'correctAnswers' => 'integer|min:0'
                ]);
                $testTaker->correctAnswers = $request->correctAnswers;
            }
            if(isset($request->incorrectAnswers)) {
                $validator = $request->validate([
                    'incorrectAnswers' => 'integer|min:0'
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
                Megkaptam a feladatot, gyors ??tfutottam ??s hozz?? is l??ttam, ??sszes ??tvonal, controllerek ??s functionok k??sz is lettek gyorsan.
            </p>
            <p>
                Elgondolkozok, r??n??zek m??r, hogy t??nyleg ilyen egyszer?? lenne-e ez a feladat? ??tolvasom a feladatot ??jra mire megl??tok egy bekezd??st ami eddig elker??lte a figyelmemet.
            </p>
            <p><strong>
                Az adatm??veletek sor??n elv??r??s, hogy az oldal ne t??lt??dj??n ??jra (Ajax technol??gia
haszn??lata)
            </strong></p>
            <p>
                K??sz a diagram, felt??lt??s, backend, most mit csin??ljak?
                ??tm??soltam aminek volt haszna ??s kidobtam az eg??szet. Megcsin??ltam az ajaxot ??s m??r nem volt mit verzi??k??vetni.
            </p>
            <p>
                Ez lenne a verzi??k??vet??s, avagy annak hi??ny??nak r??vid t??rt??nete.
            </p>
            <p>
                <a href="/">Vissza</a>
            </p>
        ';
    }
}

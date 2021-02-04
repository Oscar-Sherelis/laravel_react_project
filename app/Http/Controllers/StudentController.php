<?php

namespace App\Http\Controllers;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function home () {
        return view('students');
    }
    public function api () {
        $student = DB::table('student')
        ->join('university', 'student.university_id', '=', 'university.id')
        ->select('student.id as stud_id', 'name', 'student.first_name', 'student.last_name')
        ->get();

        $marks = DB::table('mark')
        ->join('subject', 'mark.subject_id', '=', 'subject.id')
        ->join('student', 'mark.student_id', '=', 'student.id')
        ->select('name', 'mark', 'mark.student_id')
        ->orderBy('mark.student_id')
        ->get();
    
        $student = json_decode(json_encode($student), true);
        $marks = json_decode(json_encode($marks), true);
        foreach($student as &$studentObj) {
                    $counterMath = 0;
                    $counterFiloshophy = 0;
                    $counterProjectControl = 0;
                    $counterEnglish = 0;
                    $counterOOP = 0;

                    $sumMath = 0;
                    $sumFilosophy = 0;
                    $sumProjectControl = 0;
                    $sumEnglish = 0;
                    $sumOOP = 0;
                    
            foreach($marks as $markObj) {
                if ($studentObj['stud_id'] == $markObj['student_id']) {
                    
                    switch ($markObj['name']) {
                        case 'Diskrečioji matematika':
                            $counterMath++;
                            $sumMath += $markObj['mark'];
                            break;
                        case 'Filosofija':
                            $counterFiloshophy++;
                            $sumFilosophy += $markObj['mark'];
                            break;
                        case 'Objektinis programavimas':
                            $counterOOP++;
                            $sumOOP += $markObj['mark'];
                            break;
                        case 'Anglų k.':
                            $counterEnglish++;
                            $sumEnglish += $markObj['mark'];
                            break;
                        case 'Projektų valdymas':
                            $counterProjectControl++;
                            $sumProjectControl += $markObj['mark'];
                            break;
                    }
                }
            }
            $studentObj['math'] = number_format(round($sumMath / $counterMath, 1), 1);
            $studentObj['english'] = number_format(round($sumEnglish / $counterEnglish, 1), 1);
            $studentObj['filosophy'] = number_format(round($sumFilosophy / $counterFiloshophy, 1), 1);
            $studentObj['oop'] = number_format(round($sumOOP / $counterOOP, 1), 1);
            $studentObj['project_control'] = number_format(round($sumProjectControl / $counterProjectControl, 1), 1);
        }
        return $student;
    }
}
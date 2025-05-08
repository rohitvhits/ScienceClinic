<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function biologyTution(){
        return view('frontend.subject.biology_subject');
    }
    public function chemistryTution(){
        return view('frontend.subject.chemistry_subject');
    }
    public function conbinedSciencesTution(){
        return view('frontend.subject.combined_sciences_subject');
    }
    public function physicsTution(){
        return view('frontend.subject.physics_subject');
    }
    public function igcseScience(){
        return view('frontend.subject.igcse_science');
    }
    public function englishTution(){
        return view('frontend.subject.english_language_literature_tuition');
    }
    public function mathematicsTution(){
        return view('frontend.subject.mathematics_tuition');
    }
    public function businessStudiesTuition(){
        return view('frontend.subject.business_studies_tuition');
    }
    public function accountingTuition(){
        return view('frontend.subject.accounting_tution');
    }
    public function computerScienceTuition(){
        return view('frontend.subject.computer_science');
    }
    public function geographyTuition(){
        return view('frontend.subject.geography_tuition');
    }
    public function historyTuition(){
        return view('frontend.subject.history_tuition');
    }
    public function lawTuition(){
        return view('frontend.subject.law_tuition');
    }
    public function sociologyTuition(){
        return view('frontend.subject.sociology_tuition');
    }
    public function psychologyTuition(){
        return view('frontend.subject.psychology_tuition');
    }
    public function philosophyTuition(){
        return view('frontend.subject.philosophy_tuition');
    }
    public function politicsTuition(){
        return view('frontend.subject.politics_tution');
    }
    public function commonEntranceExamTution(){
        return view('frontend.subject.11_common_entrance_exam');
    }
    public function primarySchool(){
        return view('frontend.subject.primary_school_tuition');
    }
    public function spanishTuition()
    {
        return view('frontend.subject.spanish_tuition');
    }
    public function frenchTuition()
    {
        return view('frontend.subject.french_tuition');
    }
    public function germanTuition()
    {
        return view('frontend.subject.german_tuition');
    }
    public function latinTuition()
    {
        return view('frontend.subject.latin_tuition');
    }
}
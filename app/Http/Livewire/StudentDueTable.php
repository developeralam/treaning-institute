<?php

namespace App\Http\Livewire;

use App\StudentProfile;
use Livewire\Component;

class StudentDueTable extends Component
{
//    public $search = "";
    public function render()
    {
        return view('livewire.student_due-table',[
            'students' => StudentProfile::get(),
        ]);
    }
}

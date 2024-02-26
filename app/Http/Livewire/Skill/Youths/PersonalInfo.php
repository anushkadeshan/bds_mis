<?php

namespace App\Http\Livewire\Skill\Youths;

use Livewire\Component;

class PersonalInfo extends Component
{
    public $step1 = false;
    public $schol_given_on;
    public $ref_no;
    public $schol_type;

    public function save(){

        $this->step1 = true;

    }

    public function render()
    {
        return view('livewire.skill.youths.personal-info');
    }
}

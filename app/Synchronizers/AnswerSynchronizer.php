<?php

namespace App\Synchronizers;

use App\Models\Answer;

class AnswerSynchronizer
{

    protected $answer;

    function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function execute(){
        $this->synchronizeUpdatability();
    }

    protected function synchronizeUpdatability()
    {
        if ($this->answer->evaluation->repositories()->first()->is_in_progress) {
            if ($this->answer->evaluation->is_in_progress || $this->answer->evaluation->is_answered) {
                $this->answer->update(['is_updateable' => 1]);
                return;
            }
        }
        if ($this->answer->evaluation->repositories()->first()->has_observations) {
            if ($this->answer->evaluation->is_in_progress || $this->answer->evaluation->is_answered) {
                if ($this->answer->observation || $this->answer->choice == null) {
                    $this->answer->update(['is_updateable' => 1]);
                    return;
                }
            }
        }
        $this->answer->update(['is_updateable' => 0]);
        return;
    }
}

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Evaluators showable
    |--------------------------------------------------------------------------
    |
    | This variable indicates if the repository users can see their evaluators
    | This is a boolean variable
    |
    */

    'evaluators_shownables' => (bool) env('DPYX_EVALUATORS_SHOWNABLE', true),

    /*
    |--------------------------------------------------------------------------
    | Has certification
    |--------------------------------------------------------------------------
    |
    | This variable indicates if the repository send a proof after the
    | repository is aproved
    |
    */

    'has_certification' => (bool) env('DPYX_HAS_CERTIFICATION', true),

];
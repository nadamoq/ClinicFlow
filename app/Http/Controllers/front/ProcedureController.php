<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        //
        $procedures = Procedure::withCount('patients')->paginate(5);

        return view('procedure.index', compact('procedures'));

    }
}

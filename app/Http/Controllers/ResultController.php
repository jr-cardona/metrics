<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $results = DB::table('answers as a')
        ->select('d.name as dimension')
        ->selectRaw('count(q.id) as min')
        ->selectRaw('count(q.id) * 5 as max')
        ->selectRaw('sum(value) as your_score')
        ->join('questions as q', 'q.id', 'a.question_id')
        ->join('dimensions as d', 'd.id', 'q.dimension_id')
        ->where('a.participant_id', $request->route('participant'))
        ->groupBy('d.id')
        ->get();

        return response()->json($results);
    }
}

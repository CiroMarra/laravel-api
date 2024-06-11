<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\project;

class ProjectController extends Controller
{
    public function index() {
        $projects = project::with('type', 'technologies')->get();

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }


    public function show($slug) {
        $project = Project::where('slug', '=', $slug)->with('type', 'technologies')->first();
        
        if ($project) {
            $data = [
                'success' => true,
                'result' => $project
            ];
        } else {
            $data = [
                'success' => false,
                'error' => 'Nessun progetto trovato con questo slug'
            ];
        }

        return response()->json($data);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    private $dataPath;

    public function __construct()
    {
        $this->dataPath = base_path('data');
    }

    public function home()
    {
        $categories = json_decode(file_get_contents($this->dataPath.'/categories.json'), true);
        $projects = json_decode(file_get_contents($this->dataPath.'/projects.json'), true);
        $highlights = array_filter($projects, function($project) {
            return $project['highlight'] === true;
        });
        return view('home', [
            'categories' => $categories,
            'highlights' => $highlights
        ]);
    }

    public function index($categoryId = 0)
    {
        $categories = json_decode(file_get_contents($this->dataPath.'/categories.json'), true);
        $category = $categoryId == 0 ? null : collect($categories)->firstWhere('id', $categoryId);
        $projects = collect(json_decode(file_get_contents($this->dataPath.'/projects.json'), true));
        $perPage = 6;
        $currentPage = Paginator::resolveCurrentPage();
        $currentPageItems = $projects->slice(($currentPage - 1) * $perPage, $perPage);
        $projects = new LengthAwarePaginator($currentPageItems, $projects->count(), $perPage, $currentPage, [
            'path' => Paginator::resolveCurrentPath()
        ]);
        return view('projects', [
            'projects' => $projects,
            'category' => $category
        ]);
    }

    public function show($id)
    {
        $projects = json_decode(file_get_contents($this->dataPath.'/projects.json'), true);
        $project = collect($projects)->firstWhere('id', $id);
        $imagePath = public_path("galleryimage/{$project['nim']}");
        $imageFiles = collect(File::files($imagePath))->map(function ($file) use ($project) {
            return asset("galleryimage/{$project['nim']}/" . $file->getFilename());
        });
        return view('highlights.' . $id, [
            'project' => $project,
            'galleries' => $imageFiles
        ]);
    }
}

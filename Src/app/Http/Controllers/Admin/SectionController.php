<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $index_route = 'admin.sections.index';

    public function __construct()
    {
        $this->authorizeResource(Section::class, 'section');
    }

    public function index(Request $request)
    {

        $page_title = __('pages.sections');
        $sections = Section::all();

        return view('admin.sections.index', compact('sections', 'page_title'));
    }

    public function create(Request $request)
    {
        $page_title = __('labels.add');

        $breadcrumbs = [
            __('pages.sections') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.sections.add', compact('page_title', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
        ]);

        $section = new Section;
        $section->name = $request->name;
        $section->save();

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.added'));
    }

    public function edit(Section $section)
    {
        $page_title = __('labels.edit')." - {$section->name}";

        $breadcrumbs = [
            __('pages.sections') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.sections.edit', compact('section', 'page_title', 'breadcrumbs'));
    }

    public function update(Request $request, Section $section)
    {

        $request->validate([
            'name' => 'required|string|max:191',
        ]);

        $section->name = $request->name;
        $section->update();

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.updated'));
    }

    public function destroy(Section $section)
    {

        $section->delete();

        return back()->withSuccess(__('messages.success.deleted'));
    }
}

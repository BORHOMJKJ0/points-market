<?php

namespace App\Http\Controllers\Admin;

use _Storage;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $index_route = 'admin.sliders.index';

    public function __construct()
    {
        $this->authorizeResource(Slider::class, 'slider');
    }

    public function index()
    {

        $page_title = __('pages.sliders');
        $sliders = Slider::all();

        return view('admin.sliders.index', compact('sliders', 'page_title'));
    }

    public function create()
    {

        $page_title = __('labels.add');

        $breadcrumbs = [
            __('pages.sliders') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.sliders.add', compact('page_title', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'link' => 'nullable|url',
        ]);

        $slider = new Slider;
        $slider->image = _Storage::upload('image', 'sliders');

        $slider->link = $request->link;
        $slider->save();

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.added'));

    }

    public function edit(Slider $slider)
    {
        $page_title = __('labels.edit')." - $slider->title";
        $breadcrumbs = [
            __('pages.sliders') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.sliders.edit', compact('slider', 'page_title', 'breadcrumbs'));
    }

    public function update(Slider $slider, Request $request)
    {
        $request->validate([
            'image' => 'nullable|image',

            'link' => 'nullable|url',
        ]);

        $slider->image = _Storage::upload('image', 'sliders', $slider->image);

        $slider->link = $request->link;

        $slider->update();

        return redirect()->route($this->index_route)->with('success', __('messages.success.updated'));

    }

    public function destroy(Slider $slider)
    {

        $slider->delete();

        return redirect()->route($this->index_route)->with('success', __('messages.success.deleted'));
    }
}

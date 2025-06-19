<?php

function current_page(...$pages)
{
    return request()->is($pages) ? 'open active in' : '';
}

function selected($value1, $value2)
{
    return ($value1 == $value2) ? 'selected' : '';
}

function alert($type, $messages, $with_exit = true)
{

    $messages = collect($messages ?: null);

    return view('helpers.messages.alert', compact('type', 'messages', 'with_exit'));
}

function modal($id, $view, $attributes = [])
{

    $attributes['id'] = $id;
    $attributes['view'] = $view;
    $attributes['width'] = $attributes['width'] ?? 'md';
    $attributes['title'] = $attributes['title'] ?? '';
    $attributes['attributes'] = $attributes;

    return view('helpers.modal', $attributes);
}

function current_tab(...$tabs)
{
    $found = false;
    $session_tabs = session('tabs') ?? [];
    $current_url = '/'.request()->path();

    foreach ($tabs as $tab) {
        $found = $found || (isset($session_tabs[$current_url]) && $session_tabs[$current_url] == $tab);
    }

    return $found ? 'show active' : '';
}

function validationErrors()
{
    return view('helpers.messages.validation');
}

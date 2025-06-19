<?php

use Illuminate\Support\Collection;

class Form
{
    public static function input($name, $attributes = [])
    {
        $attributes = self::set_attributes($name, $attributes);

        return view('admin.helpers.form.input', $attributes)->render();
    }

    public static function file($name, $attributes = [])
    {
        $attributes['type'] = $attributes['type'] ?? 'image';
        $attributes = self::set_attributes($name, $attributes);

        return view('admin.helpers.form.file', $attributes)->render();
    }

    public static function textarea($name, $attributes = [])
    {
        $attributes = self::set_attributes($name, $attributes);

        return view('admin.helpers.form.textarea', $attributes)->render();
    }

    public static function select($name, $dataArray, $attributes = [])
    {
        $attributes = self::set_attributes($name, $attributes);
        $attributes['value'] = self::array_to_collect($attributes['value']);
        $attributes['dataArray'] = self::array_to_collect($dataArray);

        return view('admin.helpers.form.select', $attributes)->render();
    }

    public static function boolean_select($name, $attributes = [])
    {
        $dataArray = ['yes', 'no'];
        $attributes['nameFunction'] = fn ($item) => __("labels.$item");
        $attributes['valueFunction'] = fn ($item) => ($item == 'yes' ? '1' : '0');
        $attributes['with_not_exists'] = false;

        return self::select($name, $dataArray, $attributes);
    }

    public static function submit($attributes = [])
    {
        $attributes['title'] = $attributes['title'] ?? __('labels.save');
        $attributes['icon'] = $attributes['icon'] ?? 'i-Data-Save';

        return view('admin.helpers.form.submit', $attributes)->render();
    }

    private static function set_attributes($name, $attributes)
    {
        /**
         * General
         */
        $attributes['name'] = $name;
        $attributes['id'] = $attributes['id'] ?? $name;
        $attributes['title'] = $attributes['title'] ?? __("validation.attributes.$name");
        $attributes['required'] = $attributes['required'] ?? true;
        $attributes['type'] = $attributes['type'] ?? 'text';

        $attributes['value'] = old($name) ?? $attributes['value'] ?? null;

        $attributes['help'] = $attributes['help'] ?? '';
        $attributes['hidden'] = $attributes['hidden'] ?? false;
        $attributes['tooltip'] = $attributes['tooltip'] ?? '';
        $attributes['extra'] = $attributes['extra'] ?? '';
        $attributes['class'] = $attributes['class'] ?? '';
        $attributes['input_width'] = $attributes['input_width'] ?? 6;
        $attributes['label_width'] = $attributes['label_width'] ?? 6;

        /**
         * Textarea
         */
        $attributes['ckeditor'] = $attributes['ckeditor'] ?? true;

        /**
         * File
         */
        $attributes['multiple'] = $attributes['multiple'] ?? false;
        $attributes['accept'] = $attributes['accept'] ?? 'image/*';
        $attributes['multiple_delete_url'] = $attributes['multiple_delete_url'] ?? null;
        $attributes['multiple_file_url'] = $attributes['multiple_file_url'] ?? null;

        if ($attributes['multiple']) {
            $attributes['value'] = $attributes['value'] ?? collect();
        }

        /**
         * Select
         */
        $attributes['valueFunction'] = $attributes['valueFunction'] ?? fn ($item) => $item->id ?? null;
        $attributes['nameFunction'] = $attributes['nameFunction'] ?? fn ($item) => $item->title ?? null;
        $attributes['with_search'] = $attributes['with_search'] ?? true;
        $attributes['with_not_exists'] = $attributes['with_not_exists'] ?? true;

        return $attributes;
    }

    /**
     * @return Collection
     */
    private static function array_to_collect($array)
    {
        return is_array($array) ? collect($array) : $array;
    }
}

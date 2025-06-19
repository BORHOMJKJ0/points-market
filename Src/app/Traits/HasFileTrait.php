<?php

namespace App\Traits;

use _Storage;

trait HasFileTrait
{
    public function delete_files()
    {

        self::deleting(function ($model) {
            foreach ($model->files as $file) {
                _Storage::delete_file($model->{$file});
            }
        });

    }

    public function uploads($name)
    {
        return _Storage::uploads($this->{$name});
    }
}

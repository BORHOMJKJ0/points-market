let mix = require("laravel-mix");

/**
 * Global
 */

mix
    .disableNotifications()
    .version()
    .setPublicPath('..')
    .copyDirectory('resources/assets/images', '../assets/images')
    .options({
        processCssUrls: false,
    });

/** Admin */

mix
    .sass("resources/assets/admin/scss/themes/lite-purple.scss", "assets/admin/css/themes")
    .sass("resources/assets/admin/scss/themes/lite-blue.scss", "assets/admin/css/themes")
    .sass("resources/assets/admin/scss/themes/dark-purple.scss", "assets/admin/css/themes");

mix
    .js([
        'resources/assets/admin/js/scripts/script.js',
        'resources/assets/admin/js/scripts/sidebar.large.js',
        'resources/assets/admin/js/scripts/ckeditor.js',
        'resources/assets/admin/js/scripts/datatables.js',
        'resources/assets/admin/js/scripts/sort.js',
    ], 'assets/admin/js/app.js')

    .js([
        'resources/assets/admin/js/vendor/ckeditor.js',
    ], "assets/admin/js/vendor.js")

mix
    .copyDirectory('resources/assets/admin/images', '../assets/admin/images')
    .copyDirectory('resources/assets/admin/fonts', '../assets/admin/fonts');


/** Site */

mix
    .copyDirectory('resources/assets/site/images', '../assets/site/images')
    .copyDirectory('resources/assets/site/fonts', '../assets/site/fonts')
    .copyDirectory('resources/assets/site/js', '../assets/site/js')
    .copyDirectory('resources/assets/site/css', '../assets/site/css');

<?php

/**
 * Plugin Name: SVG Grid Options Page
 * Plugin URI: https://example.com
 * Description: A WordPress plugin that displays a grid of SVGs and allows copying their code to the clipboard.
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://example.com
 */

add_action('admin_menu', 'svg_grid_add_menu_page');

function svg_grid_add_menu_page()
{
    add_submenu_page(
        'options-general.php',
        'SVG Library',
        'SVG Library',
        'manage_options',
        'svg-grid-options',
        'svg_grid_options_page'
    );
}

function svg_grid_enqueue_scripts($hook)
{
    if ('settings_page_svg-grid-options' === $hook) {
        wp_enqueue_script('svg-grid-clipboard', 'https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js', array('jquery'), '2.0.10', true);
        wp_enqueue_script('svg-grid-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery', 'svg-grid-clipboard'), '1.0', true);
    }
}
add_action('admin_enqueue_scripts', 'svg_grid_enqueue_scripts');

$svgs = array(
    array(
        'title' => 'Image Pathways',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M512 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h448c35.35 0 64-28.65 64-64V96C576 60.65 547.3 32 512 32zM560 416c0 26.47-21.53 48-48 48H64c-26.47 0-48-21.53-48-48V96c0-26.47 21.53-48 48-48h448c26.47 0 48 21.53 48 48V416zM480 96H96C78.33 96 64 110.3 64 128v256c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32V128C512 110.3 497.7 96 480 96zM496 384c0 8.822-7.178 16-16 16H96c-8.822 0-16-7.178-16-16V288h107.1l29.78 59.58C218.2 350.3 220.1 352 224 352c3.094-.0781 6.062-1.922 7.312-4.75l57.13-128.5l32.41 64.84C322.2 286.3 324.1 288 328 288h80C412.4 288 416 284.4 416 280S412.4 272 408 272h-75.06l-37.78-75.58C293.8 193.7 291 191.9 287.8 192C284.7 192.1 281.9 193.9 280.7 196.8l-57.13 128.5L199.2 276.4C197.8 273.7 195 272 192 272H80V128c0-8.822 7.178-16 16-16h384c8.822 0 16 7.178 16 16V384z"></path></svg>'
    ),
    array(
        'title' => 'Application Status',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-primary" d="M448 32C483.3 32 512 60.65 512 96V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM448 96H64V416H448V96z"></path><path class="fa-secondary" d="M128 160V96H192V160H448V224H192V288H448V352H192V416H128V352H64V288H128V224H64V160H128z"></path></svg>'
    ),
    array(
        'title' => 'Team Member',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-primary" d="M176 256c35.35 0 64-28.65 64-64s-28.65-64-64-64s-64 28.65-64 64S140.7 256 176 256zM208 288h-64C99.82 288 64 323.8 64 368C64 376.8 71.16 384 80 384h192c8.836 0 16-7.164 16-16C288 323.8 252.2 288 208 288z"></path><path class="fa-secondary" d="M512 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h448c35.35 0 64-28.65 64-64V96C576 60.65 547.3 32 512 32zM176 128c35.35 0 64 28.65 64 64s-28.65 64-64 64s-64-28.65-64-64S140.7 128 176 128zM272 384h-192C71.16 384 64 376.8 64 368C64 323.8 99.82 288 144 288h64c44.18 0 80 35.82 80 80C288 376.8 280.8 384 272 384zM496 320h-128C359.2 320 352 312.8 352 304S359.2 288 368 288h128C504.8 288 512 295.2 512 304S504.8 320 496 320zM496 256h-128C359.2 256 352 248.8 352 240S359.2 224 368 224h128C504.8 224 512 231.2 512 240S504.8 256 496 256zM496 192h-128C359.2 192 352 184.8 352 176S359.2 160 368 160h128C504.8 160 512 167.2 512 176S504.8 192 496 192z"></path></svg>'

    ),
    array(
        'title' => 'Accordion',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 248h-152V96c0-4.422-3.578-8-8-8H64C59.58 88 56 91.58 56 96v160c0 4.422 3.578 8 8 8h152V416c0 4.422 3.578 8 8 8h160c4.422 0 8-3.578 8-8V256C392 251.6 388.4 248 384 248zM216 248h-144v-144h144V248zM376 408h-144v-144h144V408zM384 32h-320C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM432 416c0 26.47-21.53 48-48 48H64c-26.47 0-48-21.53-48-48V96c0-26.47 21.53-48 48-48h320c26.47 0 48 21.53 48 48V416z"></path></svg>'
    ),
    array(
        'title' => 'Checkerboard',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 248h-152V96c0-4.422-3.578-8-8-8H64C59.58 88 56 91.58 56 96v160c0 4.422 3.578 8 8 8h152V416c0 4.422 3.578 8 8 8h160c4.422 0 8-3.578 8-8V256C392 251.6 388.4 248 384 248zM216 248h-144v-144h144V248zM376 408h-144v-144h144V408zM384 32h-320C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM432 416c0 26.47-21.53 48-48 48H64c-26.47 0-48-21.53-48-48V96c0-26.47 21.53-48 48-48h320c26.47 0 48 21.53 48 48V416z"></path></svg>'
    ),
    array(
        'title' => 'Info',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M288 352h-24.02l.0098-135.1c0-.0176 0 .0176 0 0C263.1 211.6 260.4 208 256 208H224c-4.406 0-8 3.594-8 8S219.6 224 224 224h23.98v128H224c-4.406 0-8 3.594-8 8S219.6 368 224 368h64c4.406 0 8-3.594 8-8S292.4 352 288 352zM255.9 176c8.822 0 16-7.178 16-16s-7.178-16-16-16s-16 7.178-16 16S247.1 176 255.9 176zM256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 496c-132.3 0-240-107.7-240-240S123.7 16 256 16s240 107.7 240 240S388.3 496 256 496z"></path></svg>'
    ),
    array(
        'title' => 'Landscape',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 184c13.26 0 24-10.75 24-24S173.3 136 160 136C146.7 136 136 146.7 136 160S146.7 184 160 184zM346.6 171.9c-11.28-15.81-38.5-15.94-49.1-.0313L252.6 233.3L245.6 224.4C234.2 209.9 208.6 209.8 197.2 224.4L134.2 304.8c-7.123 9.131-8.154 21.55-2.623 31.56C136.8 345.1 147.1 352 158.4 352h259.2c11 0 21.17-5.805 26.54-15.09c0-.0313-.0313 .0313 0 0c5.656-9.883 5.078-21.84-1.578-31.15L346.6 171.9zM162.2 319.9l58.25-75.61l20.09 25.66C244.9 275.5 258.1 280.6 266.1 269.4l54.44-78.75l92.68 129.2H162.2zM512 64H64C28.65 64 0 92.65 0 128v256c0 35.35 28.65 64 64 64h448c35.35 0 64-28.65 64-64V128C576 92.65 547.3 64 512 64zM544 384c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V128c0-17.64 14.36-32 32-32h448c17.64 0 32 14.36 32 32V384z"></path></svg>'
    ),
    array(
        'title' => 'Columns',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-primary" d="M576 32C611.3 32 640 60.65 640 96V416C640 451.3 611.3 480 576 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H576zM576 96H64V416H576V96z"></path><path class="fa-secondary" d="M192 96H256V416H192V96zM384 96H448V416H384V96z"></path></svg>'
    ),
    array(
        'title' => 'Users',
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M274.7 304H173.3c-95.73 0-173.3 77.6-173.3 173.3C0 496.5 15.52 512 34.66 512H413.3C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM413.3 496H34.66c-10.29 0-18.66-8.375-18.66-18.67C15.1 390.6 86.58 320 173.3 320H274.7C361.4 320 432 390.6 432 477.3C432 487.6 423.6 496 413.3 496zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM223.1 16C285.8 16 336 66.24 336 128S285.8 240 223.1 240s-112-50.24-112-112S162.2 16 223.1 16zM432 256c64.62 0 116.4-54.71 111.7-120.3c-3.445-47.64-38.17-88.11-84.4-100.1c-26.62-6.918-51.32-3.184-72.75 6.594c-3.914 1.789-5.566 6.359-3.695 10.23c.1055 .2187 .2109 .4414 .3164 .6602c1.76 3.684 6.051 5.445 9.762 3.742c14.72-6.77 31.25-10.18 48.96-8.227C490 53.84 527.8 95.26 528 143.7C528.2 196.8 485 240 432 240c-19.32 0-37.13-5.961-52.16-15.88c-3.369-2.219-7.834-1.074-10.13 2.242c-.1445 .2109-.2891 .418-.4355 .625c-2.473 3.543-1.535 8.344 2.08 10.71C388.8 249.1 409.5 256 432 256zM479.1 320H448c-4.418 0-8 3.582-8 8S443.6 336 448 336h31.1c79.5 0 144.2 64.75 144 144.3C623.1 488.1 616.7 496 608 496H496c-4.418 0-8 3.582-8 8S491.6 512 496 512h112C625.7 512 640 497.6 640 479.1C639.9 391.7 568.3 320 479.1 320z"></path></svg>'
    )
);


function svg_grid_options_page()
{
?>
    <div class="wrap">
        <h1>SVG Library</h1>
        <p>Click the icon to copy the SVG code to the clipboard.</p>

        <?php include 'svg-grid.php'; ?>
    </div>
<?php
}

function local_themecolorswitcher_extend_navigation(global_navigation $navigation) {
    global $CFG, $PAGE, $USER;

    if (isloggedin() && !isguestuser()) {
        $switchurl = new moodle_url('/local/themecolorswitcher/switch.php', ['sesskey' => sesskey()]);
        $darkmode = get_user_preferences('local_themecolorswitcher_darkmode', 0);

        if ($darkmode) {
            $switchurl->param('switch', 0);
            $PAGE->requires->css('/local/themecolorswitcher/styles/dark-theme.css');
        } else {
            $switchurl->param('switch', 1);
        }

        $menuitem = new custom_menu_item(get_string('switch_theme_color', 'local_themecolorswitcher'), $switchurl, get_string('switch_theme_color', 'local_themecolorswitcher'), 10000);
        $navigation->add('switch_theme_color', $menuitem);
    }
}

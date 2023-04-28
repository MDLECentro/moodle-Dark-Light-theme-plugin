require_once(__DIR__ . '/../../config.php');
require_login();
require_sesskey();

$switch = optional_param('switch', 0, PARAM_BOOL);

$user_preference_name = 'local_themecolorswitcher_darkmode';

if ($switch) {
    set_user_preference($user_preference_name, 1);
} else {
    unset_user_preference($user_preference_name);
}

$referer = new moodle_url(get_local_referer(false));
redirect($referer);

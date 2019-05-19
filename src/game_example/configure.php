<?php
include_once("../lti/lti.php");
include_once("db/example_database.php");

use \IMSGlobal\LTI\LTI_Message_Launch;
use \IMSGlobal\LTI\LTI_Deep_Link_Resource;
$launch = LTI_Message_Launch::from_cache($_REQUEST['launch_id'], new Example_Database());
if (!$launch->is_deep_link_launch()) {
    throw new Exception("Must be a deep link!");
}
$resource = LTI_Deep_Link_Resource::new()
    ->set_url(TOOL_HOST . "/game_example/game.php")
    ->set_custom_params(['difficulty' => $_REQUEST['diff']])
    ->set_title('Breakout ' . $_REQUEST['diff'] . ' mode!');
$launch->get_deep_link()
    ->get_response_form([$resource]);
?>
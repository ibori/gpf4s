<?
/**
 * 
 * 그누보드용 확장 스크립트
 *
 * @license http://byfun.com
 * @author	byfun (http://byfun.com)
 * @filesource
 */

define("GPF", "Gnuboard Plugin Framework");

define("GPF_PATH", G4_PATH."/gpf");
define("GPF_URL", G4_URL."/gpf");

define("GPF_ADMIN_PATH", G4_ADMIN_PATH."/gpf");
define("GPF_ADMIN_URL", G4_ADMIN_URL."/gpf");

define("GPF_INTERCEPT_SKIN", ".gpf");

define("GPF_SKIN_PATH", $board_skin_path); // 게시판 스킨 인터셉트를 위해
define("GPF_INC_SKIN_PATH", G4_PATH."/gpf/inc/skin");

define("GPF_PRE_EVENT_PREFIX", "PRE_");
define("GPF_POST_EVENT_PREFIX", "POST_");

// <g4>/bbs 에서 include 할때만 board_skin_path 를 intercept 함

if(getcwd() == realpath(G4_BBS_PATH))
{
	$board_skin_path = GPF_INC_SKIN_PATH;
}

if(!file_exists(getcwd() . "/admin.lib.php")) {	// except if current path is 'adm' folder in g4

	if($config['cf_member_skin'] != GPF_INTERCEPT_SKIN) 
	{
		define("GPF_MEMBER_SKIN", $config['cf_member_skin']);	// 회원 스킨 인터셉트를 위해
		$config['cf_member_skin'] = GPF_INTERCEPT_SKIN;
	}


	if($config['cf_search_skin'] != GPF_INTERCEPT_SKIN) 
	{
		define("GPF_SEARCH_SKIN", $config['cf_search_skin']);	// 검색 스킨 인터셉트를 위해
		$config['cf_search_skin'] = GPF_INTERCEPT_SKIN;
	}
}

include_once G4_PATH . "/gpf/gpf.php";

?>

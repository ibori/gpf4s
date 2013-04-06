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
define("GPF4S", "Gnuboard Plugin Framework 4S");
define("GPF_VERSION", 20130406);

define("GPF_PATH", G4_PATH."/gpf");
define("GPF_URL", G4_URL."/gpf");

define("GPF_ADMIN_PATH", G4_ADMIN_PATH."/gpf");
define("GPF_ADMIN_URL", G4_ADMIN_URL."/gpf");

define("GPF_INTERCEPT_SKIN", ".gpf");

define("GPF_SKIN_PATH", $board_skin_path); // 게시판 스킨 인터셉트를 위해
define("GPF_SKIN_URL", $board_skin_url); // 게시판 스킨 인터셉트를 위해

define("GPF_INC_SKIN_PATH", G4_PATH."/gpf/inc/skin");
define("GPF_INC_SKIN_URL", G4_URL."/gpf/inc/skin");

define("GPF_PRE_EVENT_PREFIX", "PRE_");
define("GPF_POST_EVENT_PREFIX", "POST_");

// <g4>/bbs 에서 include 할때만 board_skin_path 를 intercept 함

if(!defined("NO_GPF")) 
{
	if(getcwd() == realpath(G4_BBS_PATH) && !defined("NO_GPF_SKIN_INTERCEPT"))
	{
		$board_skin_path = GPF_PATH."/inc/skin";
		$board_skin_url = GPF_URL."/inc/skin";

		define("GPF_MEMBER_SKIN_PATH", $member_skin_path);	// 회원 스킨 인터셉트를 위해
		define("GPF_MEMBER_SKIN_URL", $member_skin_url);	// 회원 스킨 인터셉트를 위해
		$member_skin_path  = GPF_PATH.'/inc/member_skin';
		$member_skin_url   = GPF_URL .'/inc/member_skin';

		define("GPF_SEARCH_SKIN_PATH", $search_skin_path);	// 검색 스킨 인터셉트를 위해
		define("GPF_SEARCH_SKIN_URL", $search_skin_url);	// 검색 스킨 인터셉트를 위해
		$search_skin_path  = GPF_PATH.'/inc/search_skin';
		$search_skin_url    = GPF_URL .'/inc/search_skin';

	}
}

include_once G4_PATH . "/gpf/gpf.php";

function gpf_dbg($msg, $title = '')
{
	if(is_array($msg)) {
		ob_start();
		print_r($msg);
		$msg = ob_get_contents($msg);
		ob_end_clean();
	}
	if($title) $msg = " [ " . $title." ] ==================\n".$msg;
	echo "<textarea style='width:100%;height:200px;'>".htmlspecialchars($msg)."</textarea>";
}
?>
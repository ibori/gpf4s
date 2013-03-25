<?
$gpf_adm_menu = array();

$menu["menu717"] = array (
    array("717000", "플러그인", G4_ADMIN_URL."/gpf/index.php", 'gpf_front'),
    array("", "시작하기", G4_ADMIN_URL."/gpf/index.php", 'gpf_front'),
    array("", "플러그인", G4_ADMIN_URL."/gpf/plugins.php", 'gpf_plugins')
);

$gpf = GPF::getInstance();

if($gpf->hasAdminPlugins())
{
	$gpf_admins = $gpf->getAdminPlugins();
	$admin_cnt = 0;
	for($i=0, $to=count($gpf_admins); $i<$to; $i++, $admin_cnt++)
	{
		$v = $gpf_admins[$i];
		$prev = $gpf_admins[$i-1];
		$next = $gpf_admins[$i+1];
		
		array_push($menu["menu717"], array("", $v['label'], G4_ADMIN_URL."/gpf/admin.php?p=".$v['obj']->id."&c=".$v['id']));
	}
}

?>
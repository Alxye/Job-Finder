<?php
/*
 * @author    Zhao
 * @Created   2020/06/13
 * @filename DemoModel.class.php
 */
namespace Admin\Model;

use Think\Model;

class SettingModel extends Model {

	protected $tableName = "User";

	//自动验证
	protected $_validate = array(
		array('old_password', 'require', '请填写原密码'),
		array('password', 'require', '请填写新密码'),
		array('repassword', 'password', '重复新密码错误',0,"confirm"),
	);
	//自动完成
	protected $_auto = array(
		array('password', 'md5', 1, 'function'),
	);

}


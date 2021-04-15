<?php
/**
 * @author    Zhao
 * @Created   2020/06/13
 * @filename  PasswordModel.class.php
 */

namespace User\Model;

use Think\Model;

class PasswordModel extends Model {
	protected $tableName = "user";
	//自动验证
	protected $_validate = array(
		array("password","require","请填写您的密码！"),
		array("password",'/^\S{6,12}$/',"密码至少6位！"),
		array('re_password', 'password', '重复新密码错误！',0,"confirm"),
	);

	//自动完成
	protected $_auto = array(
		array('password', 'md5', 3, 'function'),
	);
}

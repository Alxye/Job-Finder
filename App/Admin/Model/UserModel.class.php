<?php
/*
 * @author    Zhao
 * @Created   2020/06/13
 * @filename DemoModel.class.php
 */
namespace Admin\Model;

use Think\Model;

class UserModel extends Model {

	//自动验证
	protected $_validate = array(
		array('username','require',"请填写您的账号！"),
		array('username','','帐号已经存在！',0,'unique',1),
		array('username','/^\w{3,12}$/','账号必须为3-12位的字母数字下划线！',0),
		array('alias','/^\S{6,20}$/','昵称必须为6-20位的非空格字符！',0),
		array('alias','','昵称已经存在！',0,'unique',3),
		array('alias','require','请输入您的昵称！'),
		array("password","require","请填写您的密码！"),
		array("password",'/^\S{6,12}$/',"密码至少6位！"),
		array('repassword', 'password', '重复新密码错误！',0,"confirm"),
		array('email','email','邮箱格式不正确！')
	);

	//自动完成
	protected $_auto = array(
		array('regtime', 'time', 1, 'function'),
		array('edittime', 'time', 2, 'function'),
		array('password', 'md5', 3, 'function'),
	);

}

<?php
/*
 * 角色模型类
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace Admin\Model;

use Think\Model;

class RoleModel extends Model {

	//自动验证
	protected $_validate = array(
		array('name', 'require', '请填写角色名'),
		array('remark', 'require', '请填写角色昵称'),
		array('status', 'require', '请选择状态'),
	);

}

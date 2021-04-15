<?php
namespace User\Model;

use Think\Model;

class BasicModel extends Model {
	protected $tableName = 'resume';

	//自动验证
	protected $_validate = array(
		array('truename', 'require', '请填写您的姓名', 3),
		array('email', 'email', '请填写正确邮箱', 3),
		array('phone', 'require', '请填写您手机', 3),
		array('status', 'require', '请选择您的当前状态', 3),
		array('sex', 'require', '请选择您的性别', 3),
		array('birth_year', 'require', '请完成所有必填项', 3),
		array('birth_month', 'require', '请完成所有必填项', 3),
		array('birth_day', 'require', '请完成所有必填项', 3),
		array('eid', 'require', '请完成所有必填项', 3),
		array('year', 'require', '请完成所有必填项', 3),
		array('nowcid', 'require', '请完成所有必填项', 3),
		array('oldcid', 'require', '请完成所有必填项', 3)
	);
}
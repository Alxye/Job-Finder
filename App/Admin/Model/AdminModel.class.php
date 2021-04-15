<?php
/*
 * 管理员用户模型
 * @author    Zhao
 * @Created  2020/05/28
 */
namespace Admin\Model;

use Think\Model\RelationModel;

class AdminModel extends RelationModel {

	protected $tableName = "admin";

	//自动验证
	//todo 用户名,密码正则验证
	protected $_validate = array(
		array('username', 'require', '请填写用户账号'),
		array('password', 'require', '请填写用户密码'),
		array('alias', 'require', '请填写用户昵称'),
		array('role_id', 'require', '请选择所属角色'),
	);

	//自动完成
	protected $_auto = array(
		array('logintime', 'time', 1, 'function'),
		array('password', 'md5', 1, 'function'),
	);

	//关联模型
	protected $_link = array(
		'role' => array(//关联角色表
			'mapping_type'         => self::MANY_TO_MANY, //多对多关联
			'class_name'           => "role",             //要关联的表名
			"foreign_key"          => 'user_id',          //关联的外键名称
			"relation_foreign_key" => 'role_id',          //关联表的外键名称
			"relation_table"       => 'think_role_user',     //多对多的中间关联表名称
			"mapping_fields"       => 'id,remark',
		)
	);
}

<?php
/*
 * 职位管理的自定义关联Model类
 * @author    Zhao
 * @Created   2020/06/13
 * @filename JobViewModel.class.php
 */
namespace Admin\Model;

use Think\Model\RelationModel;

class JobModel extends RelationModel {

	//自动验证
	protected $_validate = array(
		array('cid', 'require', '请选择分类名称'),
		array('title', 'require', '请填写标题党'),
		array('name', 'require', '请填写职位名称'),
		array('payid', 'is_numeric', '月薪必须为数字',0,"function"),
		array('num', 'is_numeric', '招聘人数必须为数字',0,"function"),
		array('duty', 'require', '请填写岗位职责'),
		array('request', 'require', '请填写任职要求'),
	);

	//自动完成
	protected $_auto = array(
		array('addtime', 'time', 1, 'function'),
		array('edittime', 'time', 1, 'function'),
		array('status', 1 ,1),
	);

	protected $_link = array(
		//关联分类数据表
		'category' => array(
			'mapping_type'   => self::BELONGS_TO,
			'class_name'     => "category",
			'foreign_key'    => 'cid',
			'mapping_fields' => 'name',
			'as_fields'      => 'name:cid',
		),

	);


}

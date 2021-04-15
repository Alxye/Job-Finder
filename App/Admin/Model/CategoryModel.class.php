<?php
/*
 * 分类模型类
 * @author    Zhao
 * @Created   2020/06/13
 * @filename DemoModel.class.php
 */
namespace Admin\Model;

use Think\Model;

class CategoryModel extends Model {

	//自动验证
	protected $_validate = array(
		array('module', 'require', '请选择所属模块'),
		array('pid', 'require', '请选择上级分类'),
		array('name', 'require', '请填写分类名称'),
	);

}

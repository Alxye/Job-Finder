<?php
/*
 * 标签模型类
 * @author    Zhao
 * @Created   2020/06/13
 * @filename DemoModel.class.php
 */
namespace Admin\Model;

use Think\Model;

class TagModel extends Model {

	//自动验证
	protected $_validate = array(
		array('pid', 'require', '请选择上级标签'),
		array('tagname', 'require', '请填写标签名称'),
	);

}

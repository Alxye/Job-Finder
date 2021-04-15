<?php
/**
 * 用于验证个人简求职意向信息
 * @author    Zhao
 * @Created   2020/06/13
 * @filename  BasicModel.php
 */
namespace User\Model;

use Think\Model;

class ResjobModel extends Model {
	protected $tableName = "resume";
	protected $_validate = array(
		array('hopecid', 'require', '请填写期望城市', 3),
		array('hopejob', 'require', '请填写期望职位', 3),
		array('hopepay', 'require', '请选择期望薪资', 3),
		array('desc', 'require', '请填写自我描述', 3),
	);
}
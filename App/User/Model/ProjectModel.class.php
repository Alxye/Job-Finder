<?php
/**
 * 用于验证个人简求项目经验信息
 * @author    Zhao
 * @Created   2020/06/13
 * @filename  EduactionModel.php
 */
namespace User\Model;

use Think\Model;

class ProjectModel extends Model {
	protected $tableName = "resume_pro";
	protected $_validate = array(
		array('pname', 'require', '请填写所有必填项', 3),
		array('post', 'require', '请填写所有必填项', 3),
		array('syear', 'require', '请填写所有必填项', 3),
		array('smonth', 'require', '请填写所有必填项', 3),
		array('tyear', 'require', '请填写所有必填项', 3),
		array('tmonth', 'require', '请填写所有必填项', 3),
		array('prodesc', 'require', '请填写所有必填项', 3),
	);
}
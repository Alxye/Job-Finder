<?php
/**
 * 用于验证个人简求工作经历信息
 * @author    Zhao
 * @Created   2020/06/13
 * @filename  WorkModel.php
 */
namespace User\Model;

use Think\Model;

class WorkModel extends Model {
	protected $tableName = "resume_work";
	protected $_validate = array(
		array('comname', 'require', '请填写所有必填项', 3),
		array('job', 'require', '请填写所有必填项', 3),
		array('pay', 'require', '请填写所有必填项', 3),
		array('syear', 'require', '请填写所有必填项', 3),
		array('smonth', 'require', '请填写所有必填项', 3),
		array('tyear', 'require', '请填写所有必填项', 3),
		array('wdesc', 'require', '请填写所有必填项', 3),
	);
}
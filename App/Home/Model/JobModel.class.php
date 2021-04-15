<?php
/*
 * 职位管理的自定义关联Model类
 * @author    Xixi Zhao
 * @Created  2020/05/12
 */
namespace Home\Model;

use Think\Model\RelationModel;

class JobModel extends RelationModel {

	protected $_link = array(
		//关联企业数据表
		'company' => array(
			'mapping_type'   => self::BELONGS_TO,
			'class_name'     => "company",
			'foreign_key'    => 'comid',
			'mapping_fields' => 'logo',
			'as_fields'      => 'logo',
		),

	);

}

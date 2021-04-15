<?php
namespace Admin\Model;

use Think\Model;

class CompanyModel extends Model {

	//自动验证
	protected $_validate = array(
		array("cname", "require", "请填写您的企业名称"),
		array("nowcid", "require", "请选择您的企业所在城市"),
		array("sizeid", "require", "请选择您的企业规模"),
		array("attrid", "require", "请选择您的企业性质"),
		array("industryid", "require", "请选择您所属的行业"),
		array("one", "require", "请填写您的企业亮点"),
		array("description", "require", "请填写您的企业介绍"),
		array("contact", "require", "请填写企业联系人"),
		array("phone", "require", "请填写您的联系电话"),
	);

}
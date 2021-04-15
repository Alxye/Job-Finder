<?php
/*
 * @author    Zhao
 * @Created   2020/06/13
 */
namespace Admin\Model;

use Think\Model\RelationModel;

class NewsModel extends RelationModel {

	//自动验证
	protected $_validate = array(
		array('cid', 'require', '请选择分类名称'),
		array('title', 'require', '请填写新闻标题'),
		array('content', 'require', '请填写新闻内容'),
		array('thumb', 'require', '请上传标题图片'),
	);

	//自动完成
	protected $_auto = array(
		array('addtime', 'time', 1, 'function'),
		array('edittime', 'time', 3, 'function'),
		array('uname', 'admin')
	);

	//关联模型
	protected $_link = array(
		'news_data' => array(//关联内容表
			'mapping_type'   => self::HAS_ONE,
			'class_name'     => "news_data",
			"foreign_key"    => 'id',
			"mapping_fields" => 'content',
			"as_fields"      => 'content:content',
		)
	);
}

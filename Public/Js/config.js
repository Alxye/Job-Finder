/**
 * sea.js config base
 * Created by Administrator on 2014/12/12.
 */



var alias = {

	$ : "libs/jQuery/jquery.js",
	jquery : "libs/jQuery/jquery.js",
	common : "common/common.js",
	'form-ajax':'libs/jquery-form/jquery-form',
	'bootstrap3.0':'libs/bootstrap3.0/bootstrap.min.js',
	'bootstrap3.0-css':'libs/bootstrap3.0/bootstrap.min.css',
	'bootstrap-switch':'libs/bootstrap3.0/bootstrap-switch.min.js',
	'imgareaselect':'libs/jquery-plugin/imgareaselect/jquery.imgareaselect.pack.js',
	'imgareaselect-css':'libs/jquery-plugin/imgareaselect/imgareaselect-default.css',
	'imgliquid':'libs/jquery-plugin/imgliquid-min.js', //图片会根据容器大小而自动缩放

	//date-time
	'bootstrap-date':'libs/bootstrap3.0/date-time/bootstrap-datepicker.min.js',
	'datetimepiker-css':'libs/bootstrap3.0/date-time/bootstrap-datetimepicker.css',
	'bootstrap-time':'libs/bootstrap3.0/date-time/bootstrap-timepicker.min.js',
	'moment':'libs/bootstrap3.0/date-time/moment.min.js',

	//Ueditor
	ue: 'libs/ueditor/ueditor.all.min',
	'ue-config':'libs/ueditor/ueditor.config.js',

	//Admin
	"admin-common" : "common/admin-common.js",
	"ace-extra":"admin/js/ace-extra.min.js",
	"typeahead-bs2":"admin/js/typeahead-bs2.min.js",
	"ace-elements":"admin/js/ace-elements.min.js",
	"ace-min":"admin/js/ace.min.js",
	"dataTables":"admin/js/jquery.dataTables.min.js",
	"dataTables-bootstrap":"admin/js/jquery.dataTables.bootstrap.js",
	"jquery-ui":"admin/js/jquery-ui-1.10.3.custom.min.js",
	"bootstrap-min":"admin/js/bootstrap.min.js",
	'bootbox':"admin/js/bootbox.min.js",
	'fuelux-tree':"admin/avatars/fuelux/fuelux.tree.min.js"
};

for (var i in alias) {
	alias[i] = wolf.seajsBase + alias[i]
}

seajs.config(
	{
		//别名配置
		alias : alias
	}
);

<?php
/*
 * 前台职位展示
 * @author    Xixi Zhao
 * @Created  2020/06/12
 */

namespace Home\Controller;

use Think\Controller;

class PersonController extends CommonController
{
    public function index()
    {
        //多条件筛选
        //要进行筛选的字段放在这里
        $conditions = array('orderid');
        //先给需要筛选的字段赋空值，这些值将输出到页面的hidden fileds 中
        $orderid = '';
        //以下循环给已经进行的筛选赋值，以便能够在下一次筛选中保留
        foreach ($conditions as $value) {
            if (isset($_GET[$value])) {
                $this->assign($value, $_GET[$value]);
            }
        }
        //查询条件
        //$where[] = array('status=1');
        if (I('keyword')) {//关键字 resume 中 搜索
            $where[] = array("truename like '%" . I('keyword') . "%' or hopejob like '%" . I('keyword') . "%'");
        }


        //排序
        if (I('orderid')) {
            $order = str_replace("_", ' ', I('orderid'));
        } else {
            $order = 'id desc';
            $this->assign('orderid', 'id_desc');
        }

        //分页
        $do = M('resume'); // 实例化Data数据对象
        $count = $do->where($where)->count();// 查询满足要求的总记录数
        $Page = new  \Think\Page($count, 10);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出

        //$field = "truename,email,phone,sex,eid,hopejob,year";
        //获取所有职位
        $personlist = $do->order($order)->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();

        foreach ($personlist as $k => $v) {
            // username
            $personlist[$k]['title'] = $v["truename"];

            //学历
            $e = getTagInfo($v['eid']);
            $personlist[$k]['eid'] = $e['tagname'];

            // 意向岗位
            $personlist[$k]['name'] = $v["hopejob"];

            // 性别
            if($v["sex"]==1)
                $personlist[$k]['sex'] = "男";
            else
                $personlist[$k]['sex'] = "女";

            // 工作经验
            $year = getTagInfo($v['year']);
            if ($year['id'] == 29) {//将0年改为“不限”
                $personlist[$k]['year'] = "不限";
            } else {
                $personlist[$k]['year'] = $year['tagname'];
            }
        }
        $this->assign("joblist", $personlist);
        $this->assign('page', $show);
        $this->assign('count', $count);

        $this->display("index");
    }
}

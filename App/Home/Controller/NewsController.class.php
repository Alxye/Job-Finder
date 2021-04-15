<?php
/*
 * 新闻广告板块控制器
 * @author    Xixi Zhao
 * @Created  2020/05/12
 */
namespace Home\Controller;
use Think\Page;
class ewsController extends CommonController {
    /**
     *
     */
    public function index(){
        $mod = M("news");
        if(!empty($_GET['cid'])){
            $where['cid']=I('cid');
            $where['status'] = 1;
        }else{
            $where['status'] = 1;
        }
        $count = $mod->where($where)->count();
        $page = new Page($count,5);
        $show = $page->show();
        $list = $mod ->where($where)->order("addtime desc")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign("list",$list);
        $this->assign("show",$show);
        $this->display();
    }
    public function info(){
        $mod = M("news_data");
        $res = M("news");
        $id = I("id");
        $info = $res->find($id);
        $content =$mod->where("id=".$id)->getField("content");
        $content = htmlspecialchars_decode($content);
		$info['hits'] = $info['hits']+1;
		$res->where("id=".$id)->setField($info);
        $this->assign("info",$info);
        $this->assign("content",$content);
        $this->display();
    }
}
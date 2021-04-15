<?php
/*
 * 登陆验证
 * @author    Xixi Zhao
 * @Created  2020/05/12
 */
namespace Home\Controller;
use Think\Controller;

/**
 * 前台登陆
 */
class LoginController extends Controller {
    public function login(){
        $this->display();
    }

    public function dologin(){
        $mod = M("user");
        if (I('username')) {
            //根据账号查找用户信息
            $info = $mod->where("username='" . I("username") . "'")->find();
            if ($info) {
                if($info['status']==1) {
                    if (md5(I("password")) == $info['password']) {
                        //登陆成功如果选择自动登陆记录登陆信息

                        //判断是否自动登陆
                        if(I('autologin')==1){
                            //如果自动登陆将用户信息写入cookie
                            cookie("username",$info['username']);
                            cookie("password",I('password'));
                        }else{
                            //如果取消自动登陆则清除cookie
                            cookie("username",null);
                            cookie("password",null);
                        }
                        //登陆成功记录登陆时间
                        $field = 'logintime';
                        $value = time();
                        $mod->where("id=" . $info["id"])->setField($field, $value);
                        //记录Session
                        $_SESSION["user"] = $info;
                        //根据用户类型登陆后去不同的页面
                        if ($_SESSION["user"]['usertype'] == 1) {
                                //回到登陆页的前一页
                                if (empty($_SESSION['refer'])) {
                                    $this->success("登陆成功", U('Index/index'));
                                } else {
                                    $this->success("登陆成功",U('Index/index'));
                                }
                        } else {
                            $this->success("登陆成功！", U("User/Job/index"));
                        }
                    } else {
                        $this->error("用户名或密码错误！");
                    }
                } else {
                    $this->error("您的账号已被禁用,请联系管理员！");
                }
            }else{
                $this->error("用户不存在！");
            }
        } else {
            $this->error("请输入用户名或密码！");
        }
    }

    /**
     * 前台退出
     */
    public function logout(){
        //退出销毁用户session
        unset($_SESSION["user"]);
        unset($_SESSION["company"]);
        $this->redirect("Index/index");
    }
}
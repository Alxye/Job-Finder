<?php
/*
 * 后台首页控制器
 * @author    Xixi Zhao
 * @Created  2020/05/14
 */
namespace Admin\Controller;


class IndexController extends CommonController {

	public function index() {

        $nowtime = time();
        $nowyear = date("Y",$nowtime);//当前年份数字
        $nowmonth = date("n",$nowtime);//当前月份数字
        $nowweek = date("W",$nowtime);//当前一年中的第几周
        $nowday = date('j',$nowtime);//当前一个月的第几天

        $count_year["people"]=0;
        $count_year["company"]= 0;
        $count_year["job"]= 0;
        $count_month["people"]=0;
        $count_month["company"]= 0;
        $count_month["job"]= 0;
        $count_day["people"]=0;
        $count_day["company"]= 0;
        $count_day["job"]= 0;

        $record=M("user")->field("id,usertype,regtime")->select();
        foreach ($record as $k => $v) {
            $regtime=$record[$k]["regtime"];
            $regtime_year=date("Y",$regtime);
            $regtime_mounth=date("n",$regtime);
            $regtime_day=date("j",$regtime);
            if($record[$k]["usertype"]==1){
                if($regtime_year==$nowyear){
                    $count_year["people"]++;
                    if($regtime_mounth==$nowmonth){
                        $count_month["people"]++;
                        if($regtime_day==$nowday){
                            $count_day["people"]++;
                        }
                    }
                }
            }
            else if($record[$k]["usertype"]==2){
                if($regtime_year==$nowyear){
                    $count_year["company"]++;
                    if($regtime_mounth==$nowmonth){
                        $count_month["company"]++;
                        if($regtime_day==$nowday){
                            $count_day["company"]++;
                        }
                    }
                }
            }
        }

        $record=M("job")->field("id,addtime")->select();
        foreach ($record as $k => $v) {
            $regtime=$record[$k]["addtime"];
            $regtime_year=date("Y",$regtime);
            $regtime_mounth=date("n",$regtime);
            $regtime_day=date("j",$regtime);
            if($regtime_year==$nowyear){
                    $count_year["job"]++;
                    if($regtime_mounth==$nowmonth){
                        $count_month["job"]++;
                        if($regtime_day==$nowday){
                            $count_day["job"]++;
                        }
                    }
                }
        }
        $DAU=0;
        $record=M("user")->field("id,logintime")->select();
        foreach ($record as $k => $v) {
            $logintime=$record[$k]["logintime"];
            $logintime_year=date("Y",$logintime);
            $logintime_mounth=date("n",$logintime);
            $logintime_day=date("j",$logintime);
            if($logintime_year==$nowyear){
                    if($logintime_mounth==$nowmonth){
                        if($logintime_day==$nowday){
                            $DAU++;
                        }
                    }
                }
        }


        $this->assign("count_day",$count_day);
        $this->assign("count_month",$count_month);
        $this->assign("count_year",$count_year);
        $this->assign("DAU",$DAU);

		$this->display();
	}
}
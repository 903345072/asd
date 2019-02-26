<?php
// 本类由系统自动生成，仅供测试用途
namespace Api\Controller;
use Think\Controller;
class CategoryController extends PublicController {
	//***************************
	// 产品分类
	//***************************
    public function index(){
    	$list = M('category')->where('tid=1')->field('id,tid,name')->select();
        $catList = M('category')->where('tid='.intval($list[0]['id']))->field('id,name,bz_1')->select();
        foreach ($catList as $k => $v) {
            $catList[$k]['bz_1'] = __DATAURL__.$v['bz_1'];
        }

    	//json加密输出
		//dump($json);
		echo json_encode(array('status'=>1,'list'=>$list,'catList'=>$catList));
        exit();
    }
    //***************************
    // 产品分类
    //***************************
    public function getcat(){
        $catid = intval($_REQUEST['cat_id']);
        if (!$catid) {
            echo json_encode(array('status'=>0,'err'=>'没有找到产品数据.'));
            exit();
        }

        $catList = M('category')->where('tid='.intval($catid))->field('id,name,bz_1')->select();
        foreach ($catList as $k => $v) {
            $catList[$k]['bz_1'] = __DATAURL__.$v['bz_1'];
        }

        //json加密输出
        //dump($json);
        echo json_encode(array('status'=>1,'catList'=>$catList));
        exit();
    }
    //***************************
    // 活动分类
    //***************************
    public function getActivity(){
        $list = M('activity')->where('is_status = 1')->order('sort asc')->field('id,name')->select();
        
        $json_arr = M('activity')->where('is_activity='.intval($list[0]['id']))->field('id,name,bz_1')->select();
        $json = array();$catList = array();
 		foreach ($json_arr as $k => $v) {
 			$json['id']=$v['id'];
 			$json['name']=$v['name'];
 			$json['photo_x']=__DATAURL__.$v['photo_x'];
 			$json['price']=$v['price'];
 			$json['price_yh']=$v['price_yh'];
 			$json['shiyong']=$v['shiyong'];
 			$json['intro']=$v['intro'];
 			$catList[] = $json;
 		}

    	//json加密输出
		//dump($json);
		echo json_encode(array('status'=>1,'list'=>$list,'list'=>$list,));
        exit();
    }
}
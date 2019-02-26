<?php
namespace Admin\Controller;
use Think\Controller;
class BusinessuserController extends PublicController{

	//*************************
	// 普通会员的管理
	//*************************
    public function index(){
        $aaa_pts_qx=1;
        $type=$_GET['type'];
        $id=(int)$_GET['id'];
        $name = trim($_REQUEST['name']);

        $names=$this->htmlentities_u8($_GET['name']);
        //搜索
        $where="1=1";
        $name!='' ? $where.=" and name like '%$name%'" : null;
        define('rows',20);
        $count=M('businessuser')->where($where)->count();
        $rows=ceil($count/rows);

        $page=(int)$_GET['page'];
        $page<0?$page=0:'';
        $limit=$page*rows;
        $userlist=M('businessuser')->where($where)->order('id desc')->limit($limit,rows)->select();
        $page_index=$this->page_index($count,$rows,$page);
        foreach ($userlist as $k => $v) {
            $userlist[$k]['addtime']=date("Y-m-d H:i",$v['creat_time']);
        }
        //====================
        // 将GET到的参数输出
        //=====================
        $this->assign('name',$name);
        //=============
        //将变量输出
        //=============
        $this->assign('page_index',$page_index);
        $this->assign('page',$page);
        $this->assign('userlist',$userlist);
        $this->display();
    }
 //编辑商户
    public function add(){
        //==================
        // GET到的参数集合
        //==================
        $id=(int)$_GET['id'];
        if($_POST['submit']==true){
            if (!$_POST['name']) {
                $this->error('请输入登录账号.'.__LINE__);
                exit();
            }

            $array = array(
                'name' => trim($_POST['name']),
                'password' => MD5(MD5($_POST['password'])) ,
                'city_id' => intval($_POST['city_id']),
                'address' => trim($_POST['address']),
            );
            if(intval($_POST['admin_id'])>0){
                //更新

                //如果原密码为空,则不更新密码。
                if (empty($_POST['newpassword'])){
                    unset($array['password']);
                }
                $sql= M('businessuser')->where("id=".intval($_POST['admin_id']))->save($array);

            }else{
                //添加
                $check = M('businessuser')->where('name="'.$array['name'].'"')->getField('id');
                if ($check) {
                    $this->error('账号已存在！');
                    exit();
                }
                $array['creat_time'] = time();
                $sql= M('businessuser')->add($array);
                $id= $sql;
            }

            if($sql){
                $this->success('保存成功！');
                exit();
            }else{
                $this->success('保存失败！');
                exit();
            }
        }
        //查询城市
        $city_list = M('city')->where('is_status = 1')->field('id,name')->select();

        //id>0则为编辑状态
        $adminuserinfo = $id>0 ? M('businessuser')->where("id=$id")->find():"";
        //=============
        //将变量输出
        //=============
        $this->assign('city_list',$city_list);
        $this->assign('id',$id);
        $this->assign('adminuserinfo',$adminuserinfo);
        $this->display();
    }

	//*************************
	//会员地址管理
	//*************************
	public function address(){
		// $aaa_pts_qx=1;
		$id=(int)$_GET['id'];
		if($id<1){return;}
		if($_GET['type']=='del' && $id>0 && $_SESSION['admininfo']['qx']==4){
		  $this->delete('address',$id);
		}
		//搜索
		$address=M('address')->where("uid=$id")->select();
		
	    //=============
		//将变量输出
		//=============
		$this->assign('address',$address);
		$this->display();
	}

	public function del()
	{
		$id = intval($_REQUEST['did']);
		$info = M('businessuser')->where('id='.intval($id))->find();
		if (!$info) {
			$this->error('会员信息错误.'.__LINE__);
			exit();
		}

		$data=array();
		$data['del'] = $info['del'] == '1' ?  0 : 1;
		$up = M('businessuser')->where('id='.intval($id))->save($data);
		if ($up) {
			$this->redirect('Businessuser/index',array('page'=>intval($_REQUEST['page'])));
			exit();
		}else{
			$this->error('操作失败.');
			exit();
		}
	}	
}
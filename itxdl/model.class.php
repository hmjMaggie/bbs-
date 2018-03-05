<?php
class Model
{
	public $name;
	private $link;
	private $pk;
	private $fields=array();
	private $field;
	private $where;
	private $order;
	private $limit;
	
	public function __construct($name){
		$this->name=$name;
		$this->link=mysqli_connect(HOST,USER,PASS) or die("连接失败！");
		mysqli_set_charset($this->link,CHARSET);
		mysqli_select_db($this->link,DBNAME);
		$this->getFields();
	}
	
	protected function getFields(){
		$sql="desc ".$this->name.";";
		$result=mysqli_query($this->link,$sql);
		while($rows=mysqli_fetch_assoc($result)){
			if($rows['Key']=="PRI"){
				$this->pk=$rows['Field'];
			}else{
				$this->fields[]=$rows['Field'];
			}
		}
	}
	
	protected function filterFields($data){
		foreach($data as $k=>$v){
			if(!in_array($k,$this->fields)&&$k!=$this->pk){
				if(PERMISSION==1){
					unset($data[$k]);
				}else if(PERMISSION==0){
					die("存在非法字段：".$k);
				}
			}
		}
		return $data;
	}
	
	public function add($data){
		$data=$this->filterFields($data);
		$keys=array_keys($data);
		$key=implode(",",$keys);
		$values=array_values($data);
		$value="'".implode("','",$values)."'";
		$sql="insert into ".$this->name." (".$key.") values (".$value.");";
		$bool=mysqli_query($this->link,$sql);
		if($bool&&mysqli_affected_rows($this->link)>0){
			return "添加id为：".mysqli_insert_id($this->link);
		}else{
			return false;
		}
	}
	
	public function del($num){
		$sql="delete from ".$this->name." where ".$this->pk."=".$num.";";
		$bool=mysqli_query($this->link,$sql);
		if($bool&&mysqli_affected_rows($this->link)>0){
			return "影响行数：".mysqli_affected_rows($this->link);
		}else{
			return false;
		}
	}
	
	public function save($data){
		$data=$this->filterFields($data);
		$set="";
		$where="";
		foreach($data as $k=>$v){
			if($k==$this->pk){//判断是否有主键条件
				$where=$k."=".$v;
			}else{
				$set.=$k."='".$v."',";
			}
		}
		$set=rtrim($set,",");
		$sql="update ".$this->name." set {$set} where ".$where;
		$bool=mysqli_query($this->link,$sql);
		if($bool&&mysqli_affected_rows($this->link)>0){
			return "影响行数：".mysqli_affected_rows($this->link);
		}else{
			return false;
		}
	}
	
	public function find($num){
		$sql="select * from {$this->name} where {$this->pk}=".$num;
		$result=mysqli_query($this->link,$sql);
		if($result&&mysqli_num_rows($result)>0){
			return mysqli_fetch_assoc($result);
		}else{
			return false;
		}
	}
	
	public function select(){
		$field=$this->field??"*";
		$where=$this->where?" where ".$this->where:"";
		$order=$this->order?" order by ".$this->order:"";
		$limit=$this->limit?" limit ".$this->limit:"";
		$sql="select {$field} from {$this->name} {$where} {$order} {$limit};";
		$this->field=null;
		$this->where=null;
		$this->order=null;
		$this->limit=null;
		$result=mysqli_query($this->link,$sql);
		if($result&&mysqli_num_rows($result)>0){
			$arr=array();
			while($rows=mysqli_fetch_assoc($result)){
				$arr[]=$rows;
			}
			return $arr;
		}else{
			return false;
		}
	}
	
	public function field($field){
		$this->field=$field;
		return $this;
	}
	
	public function where($where){
		$this->where=$where;
		return $this;
	}
	
	public function order($order){
		$this->order=$order;
		return $this;
	}
	
	public function limit($limit){
		$this->limit=$limit;
		return $this;
	}
	
	public function count(){
		$sql="select count(*) num from ".$this->name;
		$result=mysqli_query($this->link,$sql);
		if($result&&mysqli_num_rows($result)>0){
			return mysqli_fetch_assoc($result)['num'];
		}else{
			return false;
		}
	}
	
	public function query($sql){
		$str=substr($sql,0,6);
		switch($str){
			case 'select':
				$result=mysqli_query($this->link,$sql);
				if($result&&mysqli_num_rows($result)>0){
					$arr=array();
					while($rows=mysqli_fetch_assoc($result)){
						$arr[]=$rows;
					}
					return $arr;
				}else{
					return false;
				}
				break;
			default:
				$bool=mysqli_query($this->link,$sql);
				if($bool&&mysqli_affected_rows($this->link)>0){
					return "影响行数：".mysqli_affected_rows($this->link);
				}else{
					return false;
				}
				break;
		}
	}
	
	public function __destruct(){
		mysqli_close($this->link);
	}
}
?>
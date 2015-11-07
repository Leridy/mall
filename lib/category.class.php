<?php
/**
 * Class category
 * 分类类
 */
class category
{
    protected $id;
    protected $categoryName;
    protected $CName;
    protected $table = 'category';

    public function __construct($categoryName="", $CName=""){
        $this->categoryName=$categoryName;
        $this->CName=$CName;
    }

    public function deleteCategory(){
        $row = $this->id=null?null:delete($this->table,'id='.$this->id);
        return $row;
    }

    public function updateCategory(){
        $str = "categoryName = '".$this->categoryName."', cname =".$this->CName."'";
        $row = update($this->table,$str,'id ='.$this->id);
        return $row;
    }

    /**
     * @return array 插入分类
     */
    public function insertCategory(){
        $arr = array(
            'id'=>'NULL',
            'categoryName'=>$this->categoryName,
            'cname'=>$this->CName);
        $row = insert($this->table, $arr);
        return $row;
    }

    /**
     * @return mixed
     */
    protected function getIdByCategoryName(){
        $sql = "SELECT id FROM category WHERE categoryName = '".$this->categoryName."'";
        $row = fetchOne($sql);
        $this->id=$row['id'];
        return $row['id'];
    }

    /**
     * @return mixed
     */
    protected function getCategoryNameById(){
        $sql = "SELECT categoryName FROM category WHERE id = '".$this->id."'";
        $row = fetchOne($sql);
        $this->categoryName=$row['categoryName'];
        return $row['categoryName'];
    }

    /**
     * @return mixed
     */
    protected function getCNameById(){
        $sql = "SELECT cname FROM category WHERE id = '".$this->id."'";
        $row = fetchOne($sql);
        $this->categoryName=$row['CName'];
        return $row['CName'];
    }

    /**
     * 设置分类对象的id
     * @param $id
     */
    public function setId($id){
        $this->id=$id;
    }

    /**
     * 设置分类对象的分类名
     * @param $categoryName
     */
    public function setCategoryName($categoryName){
        $this->categoryName=$categoryName;
    }

    /**
     * 设置分类对象的别名
     * @param $CName
     */
    public function setCName($CName){
        $this->CName = $CName;
    }

    /**
     * @return mixed
     */
    public function getId(){
        return isset($this->id)?$this->id:$this->getIdByCategoryName();
    }

    /**
     * @return mixed|string
     */
    public function getCategoryName(){
        return isset($this->categoryName)?$this->categoryName:$this->getCategoryNameById();
    }

    /**
     * @return mixed|string
     */
    public function getCName(){
        return isset($this->CName)?$this->CName:$this->getCNameById();
    }

    /**
     * 获取数据库中所有分类的所有信息
     * @return array
     */
    public function getAllCategory(){
        $sql="SELECT * FROM category";
        $row=fetchAll($sql);
        return $row;
    }
}
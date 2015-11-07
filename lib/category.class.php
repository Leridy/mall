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

    protected function getIdByCategoryName(){
        $sql = "SELECT id FROM category WHERE categoryName = '".$this->categoryName."'";
        $row = fetchOne($sql);
        $this->id=$row['id'];
        return $row['id'];
    }

    protected function getCategoryNameById(){
        $sql = "SELECT categoryName FROM category WHERE id = '".$this->id."'";
        $row = fetchOne($sql);
        $this->categoryName=$row['categoryName'];
        return $row['categoryName'];
    }

    protected function getCNameById(){
        $sql = "SELECT cname FROM category WHERE id = '".$this->id."'";
        $row = fetchOne($sql);
        $this->categoryName=$row['CName'];
        return $row['CName'];
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setCategoryName($categoryName){
        $this->categoryName=$categoryName;
    }

    public function setCName($CName){
        $this->CName = $CName;
    }

    public function getId(){
        return isset($this->id)?$this->id:$this->getIdByCategoryName();
    }

    public function getCategoryName(){
        return isset($this->categoryName)?$this->categoryName:$this->getCategoryNameById();
    }

    public function getCName(){
        return isset($this->CName)?$this->CName:$this->getCNameById();
    }

    public function getAllCategory(){
        $sql="SELECT * FROM category";
        $row=fetchAll($sql);
        return $row;
    }
}
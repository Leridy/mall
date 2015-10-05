<?php
class category
{
    protected $id;
    protected $categoryName;

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

    public function setId($id){
        $this->id=$id;
    }

    public function setCategoryName($categoryName){
        $this->categoryName=$categoryName;
    }

    public function getId(){
        return isset($this->id)?$this->id:$this->getIdByCategoryName();
    }

    public function getCategoryName(){
        return isset($this->categoryName)?$this->categoryName:$this->getCategoryNameById();
    }


}
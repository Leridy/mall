<?php
class product
{
    protected $id = 0;      //产品id
    protected $productName; //名称
    protected $brand;       //品牌
    protected $sn;          //编号
    protected $num;         //库存
    protected $fillPrice;   //原价
    protected $nowPrice;    //折后价
    protected $description; //描述
    protected $publishTime; //发布时间
    protected $isShow;      //上架
    protected $isHot;       //热销
    protected $unitType;    //规格
    protected $weight;      //重量
    protected $sizeLong;    //长
    protected $sizeWidth;   //宽
    protected $sizeHeight;  //高
    protected $sizeUnit;    //尺寸单位

    function __construct($ProductName=null, $brand=null, $sn=null, $num=999, $fillPrice=1, $nowPrice=1, $description="description",
                         $publishTime=0, $isShow=1, $isHot=0, $unitType=10, $weight=0, $sizeLong=0, $sizeWidth=0, $sizeHeight=0,
                         $sizeUnit="cm"){
        $this->productName = $ProductName;
        $this->brand       = $brand;
        $this->sn          = $sn;
        $this->num         = $num;
        $this->fillPrice   = $fillPrice;
        $this->nowPrice    = $nowPrice;
        $this->description = $description;
        $this->publishTime = $publishTime;
        $this->isShow      = $isShow;
        $this->isHot       = $isHot;
        $this->unitType    = $unitType;
        $this->weight      = $weight;
        $this->sizeLong    = $sizeLong;
        $this->sizeWidth   = $sizeWidth;
        $this->sizeHeight  = $sizeHeight;
        $this->sizeUnit    = $sizeUnit;
    }

    public function setProduct($ProductName=null, $brand=null, $sn=null, $num=999, $fillPrice=1, $nowPrice=1, $description="description",
                               $publishTime=0, $isShow=1, $isHot=0, $unitType=10, $weight=0, $sizeLong=0, $sizeWidth=0, $sizeHeight=0,
                               $sizeUnit="cm"){
        $this->productName = $ProductName;
        $this->brand       = $brand;
        $this->sn          = $sn;
        $this->num         = $num;
        $this->fillPrice   = $fillPrice;
        $this->nowPrice    = $nowPrice;
        $this->description = $description;
        $this->publishTime = $publishTime;
        $this->isShow      = $isShow;
        $this->isHot       = $isHot;
        $this->unitType    = $unitType;
        $this->weight      = $weight;
        $this->sizeLong    = $sizeLong;
        $this->sizeWidth   = $sizeWidth;
        $this->sizeHeight  = $sizeHeight;
        $this->sizeUnit    = $sizeUnit;
    }

    public function getProductFromDatabase(){
        $this->getIdByProductName();
        $sql = "SELECT * FROM products WHERE id = ".$this->id;
        $data = fetchOne($sql);
        print_r($data);
    }

    public function insertProduct(){
        $sql = "INSERT INTO mall.products (
productName, brand, sn, num, fillPrice, nowPrice, description,
publishTime, isShow, isHot, unitType, weight, sizeLong,
sizeWidth, sizeHeight, sizeUnit
) VALUES (
'{$this->productName}', '{$this->brand}', '{$this->sn}', '{$this->num}', '{$this->fillPrice}', '{$this->nowPrice}', '{$this->description}',
'{$this->publishTime}', '{$this->isShow}', '{$this->isHot}', '{$this->unitType}', '{$this->weight}', '{$this->sizeLong}',
'{$this->sizeWidth}', '{$this->sizeHeight}', '{$this->sizeUnit}'
);";
        print_r(mysql_query($sql));
    }

    public function updateProduct(){
        $this->getIdByProductName();
        $sql = "UPDATE products SET brand = '".$this->brand."' WHERE products.id = {$this->id};";
        fetchOne($sql);
    }

    public function deleteProduct(){
        $this->getIdByProductName();
        $sql = "DELETE FROM products WHERE products.id = ".$this->id;
        fetchOne($sql);
        $this->deleteImages();
        return 1;
    }

    protected function deleteImages(){
        $this->deleteImage();
    }

    protected function deleteImage(){
        return 1;
    }

    public function getIdByProductName(){
        if ($this->id == 0){
            $sql = "SELECT id FROM products WHERE products.productName = '".$this->productName."'";
            $id = fetchOne($sql);
            $this->id = $id['id'];
        }
    }

    public function setId($id){
        $this->id = $id;
    }
}
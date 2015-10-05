<?php
class product
{
    protected $data=array(
        "id"            =>null,           //产品id
        "ProductName"   =>null,           //名称
        "brand"         =>null,           //品牌
        "sn"            =>null,           //编号
        "num"           =>999,            //库存
        "fillPrice"     =>1,              //原价
        "nowPrice"      =>1,              //折后价
        "description"   =>"description",  //描述
        "publishTime"   =>0,              //发布时间
        "isShow"        =>1,              //上架
        "isHot"         =>0,              //热销
        "unitType"      =>10,             //规格
        "weight"        =>0,              //重量
        "sizeLong"      =>0,              //长
        "sizeWidth"     =>0,              //宽
        "sizeHeight"    =>0,              //高
        "sizeUnit"      =>"cm",           //尺寸单位
        "categoryId"    =>0               //该产品所属的分类
    );

    /**
     * 构造函数
     * @param array $data
     */
    function __construct($data){
        $this->setProduct($data);
    }

    /**
     * 设置产品对象属性
     * @param array $data
     */
    public function setProduct($data){
        foreach($data as $key => $value){
            if(array_key_exists($key,$this->data)){
                $this->data[$key] = $data[$key];
            }
        }
    }

    /**
     * 从数据库获取产品属性到对象
     */
    public function getProductFromDatabase(){
        $this->data = $this->getProductArrayFromDatabase();
    }

    /**
     * 跳过对象直接返回产品属性数组
     * @return array
     */
    public function getProductArrayFromDatabase(){
        $this->getIdByProductName();
        $sql = "SELECT * FROM products WHERE id = ".$this->id;
        $data = fetchOne($sql);
        return $data;
    }

    /**
     * 从对象插入产品属性到数据库
     */
    public function insertProduct(){
        insert("products",$this->data);
    }

    /**
     * 从对象更新数据库
     */
    public function updateProduct(){
        $this->getIdByProductName();
        update("products",$this->data,"id = ".$this->data["id"]);
    }

    /**
     * 删除该对象对应的数据库信息
     */
    public function deleteProduct(){
        $this->getIdByProductName();
        delete("products","id = ".$this->data["id"]);
    }

    protected function deleteImages(){
        // TODO
        $this->deleteImage();
    }

    protected function deleteImage(){
        // TODO
        return 1;
    }

    /**
     * 通过产品名获取产品id
     * @return int
     */
    protected function getIdByProductName(){
        if ($this->data["id"] == 0){
            $sql = "SELECT id FROM products WHERE products.productName = '".$this->productName."'";
            $id = fetchOne($sql);
            $this->data["id"] = $id['id'];
        }
        return $this->data["id"];
    }

    /**
     * 获取产品id
     * @return int
     */
    public function getId(){
        return $this->data["id"]?$this->data["id"]:$this->getIdByProductName();
    }

    /**
     * 设置对象的产品id
     * @param int $id
     */
    public function setId($id){
        $this->data["id"] = $id;
    }
}
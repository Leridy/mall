/*
	Author:leridy
	date:2015/11/8
	description:The javascript function file of shopping cart
*/

/*判断商品是否被选中  选中则修改背景色*/

var productChecked=function(id){
    var getId=$(id).attr("id");
    var idArr=getId.split("_");
    var parentId="#"+idArr[0]+"_"+idArr[1]+"_"+idArr[2];
    if($(id).is(':checked')){
        $(parentId).addClass("product_checked");
    }else{
        $(parentId).removeClass("product_checked");
    }
};


/*计算购物车中商品单价*/

var countSubtotal=function(id){
	var getId=$(id).attr("id");
	var idArr=getId.split("_");
	var quantity="#"+"quantity"+"_"+idArr[1];
	var unit_price="#"+"unit_price"+"_"+idArr[1];
	var subtotal="#"+"subtotal"+"_"+idArr[1];
	var q_val=$(quantity).val();
	var u_val=$(unit_price).html();
	$(subtotal).html(q_val*u_val);

}
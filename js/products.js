
function remove_class(obj){
    var li = document.querySelectorAll("#categories li");
    
    for(var i = 0; i < li.length; i++){
        li[i].removeAttribute("class");
    }
    location.href = "products.php?cate=" + obj.getAttribute("name");
    //console.log("cate="+obj.getAttribute("name").toString());
    //new SimpleAjax('./get_cate.php', 'get', "cate="+obj.getAttribute("name").toString(),onsuccess,onfailure);
}



window.onload = function() {
	function delete_pro() {
		var index = this.id;
		var email = document.getElementById("email").value;
		var key = document.getElementById("key").value;
		//new SimpleAjax('delete.php','POST', 'index='+ index + '&email=' + email + '&key=' + key);
		
		var count = document.getElementById("count").value;
		for(var i = parseInt(index)+1;i < count;i++){
			var it = document.getElementById(i).getElementsByTagName("td");
			it[0].innerHTML = i;
		}
		var item = document.getElementById(index);
		item.parentNode.removeChild(item);

		location.href = "delete.php ? index=" + index + "&email=" + email +"&key=" + key;
	}

	var but = document.querySelectorAll(".close");
	for(var i = 0;i < but.length;i++){
		but[i].onclick = delete_pro;
	}
	
};
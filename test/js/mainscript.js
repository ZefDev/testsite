window.onload = function() {


	document.getElementById('pager_gallery').addEventListener('click', pager_gallery, false);

	/*Функция для перехода по страницам продуктов*/
	function pager_gallery(event){
	  event = event || window.event
	  var t = event.target;
	  var array; 
	 
	  switch (t.tagName) {
		  case 'A':
		      var page = t.id;
		      ajax({url: "includes/workingWithBase.php?tag=refresh_gallery",statbox:"section_gallery", tag:"refresh_gallery", method:"POST", data: { page}});
		    
		    break;
		  default:
		    //alert("Какая-та уйня");
		    break;
		}
	}
}

function ajax(param)
{
        if (window.XMLHttpRequest) req = new XMLHttpRequest();
        method=(!param.method ? "POST" : param.method.toUpperCase());

        if(method=="GET")
        {
                       send=null;
                       param.url=param.url+"&ajax=true";
        }
        else
        {
                       send="";
                       for (var i in param.data) send+= i+"="+param.data[i]+"&";
                       send=send+"ajax=true";
        }
        req.open(method, param.url, true);
        if(param.statbox)document.getElementById(param.statbox).innerHTML = "<img id='gallery_loading' src='img/logo.gif'>";
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send(send);
        req.onreadystatechange = function()
        {
           if (req.readyState == 4 && req.status == 200) //если ответ положительный
           {
               var a = req.responseText;
               //alert(a);
                var array = JSON.parse(a);
                d = document;
                /*change для подгрузки инфы в диологовые окна а update для обнавление записей*/
              if(param.tag == "refresh_gallery"){
                    d.getElementById('section_gallery').innerHTML =  array.section_gallery;
                    d.getElementById('pager_gallery').innerHTML =  array.gallery_pages;
              }
           }
        }
}

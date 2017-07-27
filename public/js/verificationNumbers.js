function showCheck(a){
	var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
	ctx.clearRect(0,0,1000,1000);
	ctx.font = "80px 'Microsoft Yahei'";
	ctx.fillText(a,0,100);
	ctx.fillStyle = "white";
}
var code ;    
function createCode(){       
    code = "";      
    var codeLength = 4;
    var selectChar = new Array(1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','j','k','l','m','n','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');      
    for(var i=0;i<codeLength;i++) {
       var charIndex = Math.floor(Math.random()*60);      
      code +=selectChar[charIndex];
    }      
    if(code.length != codeLength){      
      createCode();      
    }
    showCheck(code);
}
          
function validate () {
    var inputCode = document.getElementById("J_codetext").value.toUpperCase();
    var codeToUp=code.toUpperCase();
    if(inputCode.length <=0) {
      document.getElementById("J_codetext").setAttribute("placeholder","输入验证码");
      createCode();
      return false;
    }
    else if(inputCode != codeToUp ){
      document.getElementById("J_codetext").value="";
      document.getElementById("J_codetext").setAttribute("placeholder","验证码错误");
      createCode();
      return false;
    }
    else {
      createCode();
      return true;
    }
}

function ajaxLogin() {
	var adminName = $('#adminName').val();
	var adminPwd = $('#adminPwd').val();
	var token = $('#token').val();
	var str1 = "adminName=" + adminName;
	var str2 = "adminPwd=" + adminPwd;
	var str3 = '_token=' + token;
	var xhr = new XMLHttpRequest();
	xhr.open('post','auth',true);
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	xhr.send(str1 + '&' + str2 + '&' + str3);
	xhr.onreadystatechange = function() {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					var resp = JSON.parse(xhr.responseText);
					if(resp == 1){
						window.location = 'index'
					}else{
						alert('用户名或者密码错误');
					}
				}
			}
		}
}

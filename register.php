<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>

<style type="text/css" >    
</style>
<link rel="stylesheet" href="css/register.css">

<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    $().ready(function(){
        $('#phone').keyup(function(){
            if( $('#phone').val().length <10 )
                $('#phone_check').text("長度不足").css({'color':'red'});
            else
                $('#phone_check').text("");
                
            if( isNaN($(this).val()) )
                $('#phone_check').text("非號碼").css({'color':'red'});
            else
                $('#phone_check').text("");
            
        });
        
        $('.submit').click(function(){
          var check_ok=true;
            $('fieldset li div.checkform').show();
            if( $('#us').val() == "" ){
                $('#us_check').text("未填值").css({'color':'red'});
                check_ok=false;
            }else{
                $('#us_check').text("");
            }
            
            if( $('#pw').val() == "" ){
                $('#pw_check').text("未填值").css({'color':'red'});
                check_ok=false;
            }else{
                $('#pw_check').text("");
            }
            
            if( $('#pw_re').val() == "" ){
                $('#pw_re_check').text("未填值").css({'color':'red'});
                check_ok=false;
            }else if( $('#pw').val() != $('#pw_re').val() ){
                $('#pw_re_check').text("確認密碼不一樣").css({'color':'red'});
                check_ok=false;
            }else{
                $('#pw_re_check').text("");
            }
            
            if( $('#name').val() == "" ){
                $('#name_check').text("未填值").css({'color':'red'});
                check_ok=false;
            }else{
                $('#name_check').text("");
            }
            
            if( $('#email').val() == "" ){
                $('#email_check').text("未填值").css({'color':'red'});
                check_ok=false;
            }else{
                $('#email_check').text("");
            }
            
            var email = $('#email').val();
            if (email != '') {//判断
                var patten = new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
                //return patten.test(email);
                if(!patten.test(email)) {
                    $('#email_check').text("值不正確").css({'color':'red'});
                    check_ok=false;
                } else {
                    $('#email_check').text("");
                    event.preventDefault();
                }
            }

                if(check_ok==true){
                    //window.location.href = 'register_ck.php';
                    
                    $.post("register_ck.php", {
                        'us': $('#us').val(), 
                        "pw": $('#pw').val(), 
                        'name': $('#name').val(),
                        'email': $('#email').val(),
                        'birthday': $('#birthday').val(),
                        'sex': $('#sex').val(),
                        'phone': $('#phone').val() },
                        function(data,status){
                            if(data!='帳號已存在'){
                                window.location.href = 'index.php';
                                alert('註冊成功');
                            }
                            else{
                                $('#us_check').text(data).css({'color':'red'});
                            }
                        });
                   // $().load('regiser_ck.php');
//                    $.ajax({						//本身做ajax技術傳輸，當按下 "新增群組" 觸發
//                        url: 'regiser_ck.php',
//                        cache: false,
//                        dataType: 'html',
//                            type:'POST',
//                        data:  "us="+$('#us').val()+
////                               "&pw="+$('#pw').val()+
////                               "&name="+$('#name').val()+
////                               "&email="+$('#email').val()+
////                               "&birthday="+$('#birthday').val()+
////                               "&sex="+$('#sex').val()+
//                               "&phone="+$('#phone').val(),
//                        error: function(xhr) {
//                          alert('Ajax request 發生錯誤');
//                        },
//                        success: function(response) {
//
//                           //$('#us_check').html(response);
////                           $('#msg').fadeIn();
////
////                           $('#fragment-1').load('website.php');		//像是刷新 div區塊網頁
////
////                           $("#group").load(location.href + " #group");
//                           // $('.addarea').find('#group').html($gp);         
//
//                        }
//                    });
                }
                
        });
       
       $('.reset').click(function(){
           $('fieldset li div.checkform').hide();
       });
       
       
    });
    
</script>
</head>
<body >
    <?php include_once '_top.php';?>

<div align="center">
    <div id="Div_register" >
<form action="example.php">
    <fieldset>
      <legend> 用戶識別(＊為必填)</legend>
         <ol>
           <li>
             <label for="us">帳號(＊):</label>
             <input id="us" name="us" type="text" class="fildform" />
             <div id="us_check" class="checkform"></div>
           </li>
           <li>
             <label for="pw">密碼(＊)：</label>
             <input id="pw" name="pw" type="password" class="fildform" />
             <div id="pw_check" class="checkform"></div>
           </li>
           <li>
             <label for="pw_re">密碼確認(＊):</label>
             <input id="pw_re" name="pw_re" type="password" class="fildform" />
             <div id="pw_re_check" class="checkform"></div>
           </li>
          </ol>
   </fieldset>
   <fieldset>
     <legend> 用戶資料(＊為必填)</legend>
        <ol>
          <li>
             <label for="name">稱呼(＊):</label>
             <input id="name" name="name" type="text" class="fildform" />
             <div id="name_check" class="checkform"></div>
          </li>
          <li>
             <label for="email">Email(＊):</label>
             <input id="email" name="email" type="email" class="fildform" />
             <div id="email_check" class="checkform"></div>
          </li>
          <li>
             <label for="birthday">生日:</label>
             <input id="birthday" name="birthday" type="date" class="fildform" />
          </li>
          <li>
             <label for="sex">性別:</label>
             <input id="sex" name="sex" type="radio" class="fildform" value="1"/>男(Male)
             <input id="sex" name="sex" type="radio" class="fildform" value="2"/>女(Female)
          </li>
          <li>
             <label for="phone">電話:</label>
             <input id="phone" name="phone" type="text" class="fildform" maxlength="10" title="手機號碼即可"/>
             <div id="phone_check" class="checkform"></div>
          </li>
        </ol>
    </fieldset>
    <fieldset class="fildsubmit">
       <input class="submit" type="button" value="註冊" />
       <input class="reset" type="reset" value="重填" />
    </fieldset>
</form>
    </div>
</div>

</body>
</html>

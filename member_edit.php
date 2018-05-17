<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
// 尚未登入
if ( !isset($_SESSION['mid']) || !isset($_COOKIE["Us"]) || $_GET['mid']!=$_SESSION['mid']) {
  header('Location: logout.php');
}

$mid = $_GET['mid'];

include_once 'conn/db_config.php';

$sql="select * from member where mId='" . $mid ."'";
$result = $mysqli->query($sql) or die("抓取會員資料錯誤(edit)");

$data = $result->fetch_assoc();

?>

<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <title>mywebsite</title>
    
    <style type="text/css" >
        #me_img{
            width: 80px;
            height: 100px;
        }
    </style>
    
    <link rel="stylesheet" href="css/register.css">
    
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/myws_index.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    
	
	<!--<script src="http://code.jquery.com/jquery-1.8.3.js"></script>-->
    
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    
    <script type="text/javascript">
	 $().ready(function(){
             $('#php').hide();
             
        $('#phone').keyup(function(){                
            if( isNaN($(this).val()) )
                $('#phone_check').text("非號碼").css({'color':'red'});
            else
                $('#phone_check').text("");            
        });
        
        $('#me').click(function(){
            $().post('ajax_me_image.php',{
                'me_src': $('#me').val(), 
            },
                function(data,status){
                    if(data!='錯圖'){
                        alert('data'+data);
                    }
                    else{
                        $('#me_img').text(data).css({'color':'red'});                    
                    }
                });
            
//            var img = $('#me').val() ;
//            $('#me_img').attr({'src': img });
//            alert( $('#me_img').attr('src') );
        });
        
        $('.submit').click(function(){
            
          var check_ok=true;
            $('fieldset li div.checkform').show();
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
            
            
            if( $('#pw_prev').val() == ""){
                $('#pw_prev_check').text("未填值").css({'color':'red'});
                check_ok=false;
            }else{
                $('#pw_prev_check').text("");
            }
//      確認是否知道舊密碼
            if( $('#pw_prev').val() != $('.prePwCheck').val() ){
                $('#pw_prev_check').text("舊密碼不正確").css({'color':'red'});
                check_ok=false;
            }else{
                $('#pw_prev_check').text("");
            }
            
                if(check_ok==true){                                    
                    $.post("member_edit_ck.php", {
                        'us': $('#us').val(),
//                        'prePw': $('#pw_prev').val(),
                        "pw": $('#pw').val(), 
                        'name': $('#name').val(),
                        'email': $('#email').val(),
                        'birthday': $('#birthday').val(),
                        'sex': $("input[name='sex']:checked").val(),
                        'phone': $('#phone').val() },
                        function(data,status){
                            if(data!='此帳號修改錯誤'){
                                window.location.href = "myws_index.php?mid="+$('.mid').val();
                                alert('修改成功');
                            }
                            else{
                                $('#us_check').text(data).css({'color':'red'});
                            }
                     });
                }                
        });
//       
//       $('.reset').click(function(){
//           $('fieldset li div.checkform').hide();
//       });       
//       

    });
</script>
</head>
<body>
    <div id="Div_left" >         
        <a href="index.php<?php if(isset($mid))echo "?mid=$mid";?>">回首頁</a>｜
        <a href="discuss/discuss.php?mid=<?php echo $mid;?>">談論</a>｜
        <a href="share.php?mid=<?php echo $mid;?>">我的分享</a>｜ 
        <a href="">修改資料</a>｜   
        <!--<a href="upload_index.php?mid=<?php echo $mid;?>">檔案列表</a>-->
        &nbsp;&nbsp;&nbsp;
        
        <div id="Div_right" >
            <a href="logout.php">會員登出</a>
        </div>            
    </div>
        
    <div align="center">
        <div id="Div_register" >
    <form action="processupload.php" method="post" enctype="multipart/form-data" id="UploadForm">
        <fieldset>
          <legend> 用戶識別</legend>
             <ol>
               <li>
                 <label for="us">帳號:</label>
                 <input id="us" name="us" type="text" class="fildform" value="<?php echo $data['id'];?>" readonly="readonly"/>
                 <div id="us_check" class="checkform"></div>
               </li>
               <li>
                 <label for="pw_prev">舊密碼：</label>
                 <input id="pw_prev" name="pw_prev" type="password" class="fildform" value=""/>
                 <div id="pw_prev_check" class="checkform"></div>
               </li>
               <li>
                 <label for="pw">新密碼：</label>
                 <input id="pw" name="pw" type="password" class="fildform" value=""/>
                 <div id="pw_check" class="checkform"></div>
               </li>
               <li>
                 <label for="pw_re">新密碼確認:</label>
                 <input id="pw_re" name="pw_re" type="password" class="fildform" value=""/>
                 <div id="pw_re_check" class="checkform"></div>
               </li>
              </ol>
       </fieldset>
       <fieldset>
         <legend> 用戶資料</legend>
            <ol>
              <li>
                 <label for="name">稱呼:</label>
                 <input id="name" name="name" type="text" class="fildform" value="<?php echo $data['name'];?>"/>
                 <div id="name_check" class="checkform"></div>
              </li>
              <li>
                 <label for="email">Email:</label>
                 <input id="email" name="email" type="email" class="fildform" value="<?php echo $data['email'];?>"/>
                 <div id="email_check" class="checkform"></div>
              </li>
              <li>
                 <label for="birthday">生日:</label>
                 <input id="birthday" name="birthday" type="date" class="fildform" value="<?php echo $data['birthday'];?>"/>
              </li>
              <li>
                 <label for="sex">性別:</label>
                 <input id="sex" name="sex" type="radio" class="fildform" value="1" <?php if($data['sex']==1)echo "checked";?>/>男(Male)
                 <input id="sex" name="sex" type="radio" class="fildform" value="2" <?php if($data['sex']==2)echo "checked";?>/>女(Female)
              </li>
              <li>
                 <label for="phone">電話:</label>
                 <input id="phone" name="phone" type="text" class="fildform" maxlength="10" title="手機號碼即可" value="<?php echo $data['mPhone'];?>"/>
                 <div id="phone_check" class="checkform"></div>
              </li>
            </ol>
        </fieldset>
        <fieldset class="fildsubmit">
            <input class="mid" type="hidden" value="<?php echo $mid;?>" />
            <input class="prePwCheck" type="hidden" value="<?php echo $data['pw'];?>" />
           <input class="submit" type="button" value="確認更改" />
<!--           <input class="reset" type="button" value="復原" />-->
        </fieldset>
    </form>
        </div>
    </div>
    
</body>
</html>
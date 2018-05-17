<?php
// 建立 session  ，若還沒啟動 伺服器session
if (!isset($_SESSION)) {
    @session_start();
}

ob_start();

//include計算瀏覽人數模組	
include_once 'conn/db_config.php';


if (isset($_SESSION['mid']) && isset($_COOKIE["Us"]))
    header('Location: myws_index.php?mid=' . $_SESSION['mid']);


// 尚未登入
/* if (!isset($_SESSION['Username'])) {
  header('Location: index.php');
  }

  session_start();

  if( isset($_SESSION['pw']) && $_SESSION['pw']==true && $_SESSION['us']!=null){
  header("location: myws_index.php");
  } */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">

    </head>
    <body>
<!--        <div id="Div_left" >

            <a href="index.php<?php if (isset($mid)) echo "?id=$mid"; ?>">回首頁</a>｜
                <a href="../member/member_view.php?id=<?php echo $mid; ?>">瀏覽會員</a>｜
                <a href="../member/member_edit.php?id=<?php echo $mid; ?>">修改會員基本資料</a>｜ 
                <a href="../member/member_pwedit.php?id=<?php echo $mid; ?>">修改密碼</a>｜   
                <a href="..\upload\upload_index.php?id=<?php echo $mid; ?>">檔案列表</a>
                &nbsp;&nbsp;&nbsp;
            <div id="Div_right" >
                <a href="register.php">註冊會員</a>
            </div>        
        </div>-->
        <?php require_once '_top.php';?>

        <div align="center">
            <div><h3>My webSite</h3></div>
            <hr><br>
            <form action="login.php" method="post">  
                帳號(Username)：<input type="text" name="us" /><br/><br>
                密碼(Password)：<input type="password" name="pw" /><br/><br>
                <input type="submit" value="login" />
&nbsp;&nbsp;&nbsp;<?php if(isset($_GET['log']) && $_GET['log']=='err'){
                            echo '帳密錯誤';
                        }else{
                            echo $_GET['log']='';
                        } 
                  ?>
            </form>
        </div>

        <div id="foot" >
            <div ><?php 
require_once 'record_people.php';
echo "People: " . $peo; ?></div>
        </div>
    </body>
</html>

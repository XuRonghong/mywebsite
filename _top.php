<link rel="stylesheet" href="css/index.css">
<div id="Div_left" >

            <a href="index.php<?php if (isset($mid)) echo "?id=$mid"; ?>">回首頁</a><!--｜
                <a href="../member/member_view.php?id=<?php echo $mid; ?>">瀏覽會員</a>｜
                <a href="../member/member_edit.php?id=<?php echo $mid; ?>">修改會員基本資料</a>｜ 
                <a href="../member/member_pwedit.php?id=<?php echo $mid; ?>">修改密碼</a>｜   
                <a href="..\upload\upload_index.php?id=<?php echo $mid; ?>">檔案列表</a>
                &nbsp;&nbsp;&nbsp;-->
            <div id="Div_right" >
                <a href="register.php">註冊會員</a>
            </div>        
</div>
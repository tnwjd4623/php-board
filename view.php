<!DOCTYPE html>
<html>
<head>
	<meta charset = 'utf-8'>
	
</head>
<style>
	.view_table {
		border: 1px solid #444444;
		margin-top: 30px;
	}

	.view_title {
		height: 30px;
		text-align: center;
		background-color: #cccccc;
		color: white;
		width: 1000px;
	}
	.view_id {
		text-align: center;
		background-color: #EEEEEE;
		width: 30px;
	}
	.view_id2 {
		background-color: white;
		width: 60px;
	}
	.view_hit {
		background-color: #EEEEEE;
		width: 30px;
		text-align: center;
	}
	.view_hit2 {
		background-color: white;
		width: 60px;
	}
	.view_content {
		padding-top: 20px;
		border-top: 1px solid #444444;
		height: 500px;
	}
	.view_btn {
	        width: 700px;
	        height: 200px;
	        text-align: center;
	        margin: auto;
	        margin-top: 50px;
	}

	.view_btn1 {
       		height: 50px;
        	width: 100px;
        	font-size: 20px;
        	text-align: center;
        	background-color: white;
        	border: 2px solid black;
        	border-radius: 10px;
	}
	.view_comment_input {
	        width: 700px;
	        height: 500px;
	        text-align: center;
	        margin: auto;
	}
	.view_text3 {
	        font-weight: bold;
	        float: left;
	        margin-left: 20px;
	}
	.view_com_id {
 	       width: 100px;
	}
	.view_comment {
		width: 500px;
	}
</style>
<body>
	<?php 
		$connect = mysqli_connect('localhost', 'tnwjd4623', '1q2w3e4r', 'tnwjd4623');
		$number = $_GET['number'];

		session_start();
		$query = "select title, content, date, hit, id from board where number =$number";
		$result = $connect->query($query);
		$rows = mysqli_fetch_assoc($result);
	?>
	
	<table class="view_table" align=center>
        <tr>
                <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
        </tr>
        <tr>
                <td class="view_id">작성자</td>
                <td class="view_id2"><?php echo $rows['id']?></td>
                <td class="view_hit">조회수</td>
                <td class="view_hit2"><?php echo $rows['hit']?></td>
        </tr>


        <tr>
                <td colspan="4" class="view_content" valign="top">
                <?php echo $rows['content']?></td>
        </tr>
        </table>


	<!-- MODIFY & DELETE -->
	<div class="view_btn">
                <button class="view_btn1" onclick="location.href='./index.php'">목록으로</button>
                <button class="view_btn1" onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">수정</button>

                <button class="view_btn1" onclick="location.href='./delete.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
        </div>

	

	 <!-- COMMENT  -->
        <div class="view_comment_input">
                <span class="view_text3">이름</span><span class="view_text4">댓글</span><br/>
        <?php   if(!isset($_SESSION['userid']))
                {
        ?>      <p>로그인 후 댓글을 작성할 수 있습니다.</p>


	<?php	}
		else {
	?>
                <!-- 세션이 존재한다면 댓글 폼 활성화 -->
                <form method="get" action="comment_action.php">
                <span class="view_com_id"><?=$_SESSION['userid']?></span>
                <input type="hidden" name="id" value="<?=$_SESSION['userid']?>">

                <input class="view_comment"type="text" name="comment" placeholder="댓글을 입력해주세요">
                <input type="hidden" name="number" value="<?=$number?>">
                <input type="hidden" name="parent" value=0>
                <input type="submit" value="작성">
                </form>

	<?php	}
	?>
                <p>------------------------------------------------------------------------------</p>

</body>
</html>


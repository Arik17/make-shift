<?php 
session_start();
include "db.php";
//select * from menu2 where (priviledgee='100' or priviledgee2='100' or priviledgee3='100' ) and status='ENABLED' or applicable='yes' order by priority
//$sql="select distinct category from menu where priviledgee ='$_SESSION[user_level]' order by priority";

$sql="select distinct category from menu where (priviledgee='$_SESSION[user_level]' or priviledgee2='$_SESSION[user_level]' or priviledgee3='$_SESSION[user_level]' or priviledgee4='$_SESSION[user_level]' or priviledgee5='$_SESSION[user_level]' or priviledgee6='$_SESSION[user_level]' or priviledgee7='$_SESSION[user_level]' ) and status='ENABLED' or applicable='yes' order by priority";
$result=mysql_query($sql);
?>

<?php
while($row=mysql_fetch_assoc($result)){?>

    <li><?php echo $category=$row[category];?>
	
	<ul class="nav first">
	
	<?php
	$sqlm="select caption, page from menu where category='$category' and (priviledgee='$_SESSION[user_level]' or priviledgee2='$_SESSION[user_level]' or priviledgee3='$_SESSION[user_level]' or priviledgee4='$_SESSION[user_level]' or priviledgee5='$_SESSION[user_level]' or priviledgee6='$_SESSION[user_level]' or priviledgee7='$_SESSION[user_level]'  or applicable='yes') and status='ENABLED' order by priority";
		  $resultm = mysql_query($sqlm) or die(mysql_error());	
		   while ($rowm=mysql_fetch_assoc($resultm)){?>
		   
	
	

			  <li style="width:100%;"><a href="<?php echo $rowm[page];?>" style="color:#FFFFFF;"><?php echo $caption=$rowm[caption];?></a></li>
			 
		<?php
		}
        ?>
		
	</ul>
	
	</li>
       
   <?php
		}
        ?>

        
        

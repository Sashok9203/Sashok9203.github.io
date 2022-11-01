<html>
    <head>
        <meta charset="utf-8">
        <title>Сайт web-студії "Web-Deco"</title>
        <?php
         $log_path = 'log.txt';
         $user_ip = getenv('REMOTE_ADDR');
         $user_brouser = getenv('HTTP_USER_AGENT');
         $current_time = date("ymd H:i:s");
         $log_string = "$user_ip | $user_brouser | $current_time | \r\n";
         $file = fopen($log_path,"a");
         fwrite($file,$log_string,strlen($log_string));
         fclose($file);  
        ?>
        <script src = "js/clock1.js"></script>
        <script type = "text/javascript">
            function send()
            {
                var valid = true;
                var elems = document.forms[0].elements;
                for(var i = 0; i< document.forms[0].length;i++)
                {
                    if(elems[i].getAttribute('type')=='text' ||
                       elems[i].getAttribute('type')=='password'||
                       elems[i].getAttribute('type')=='email')
                       {
                           if(elems[i].value=='')
                           {
                              elems[i].style.border = '2px solid red';
                              valid=false;
                           }
                       }
                }
                if(!valid)
                {
                    alert('Заповніть всі поля ! ! !');
                    return false;
                }
            }
        </script>
<style>
    .shadowtext{
        text-shadow: 1px 3px 2px white, 0 0 1em red;
        color : #210042;
        font-size: 2em;
    }
</style>   
<script> window.onload = function()
  {
    setInterval(clockPainting,1000);
  }    
</script> 
    </head>
    <body background="images/bg.jpg">
    <table border="1" align="center" cellpadding="10">
        <tr>
            <td background="images/bg-3.jpg" colspan="2" height="150" align="right">
                <img src="images/logo.png" height="140" width="140" align="left">
                <font color="Marron"><h1 class="shadowtext">Сайт студії "Web-DECO"</h1></font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <font size="4"><b>
                <a href="index.php">Головна</a>&nbsp;&nbsp;
                <a href="fgalery.php">Фотогалерея</a>&nbsp;&nbsp;
                <a href="tel.php">Телефони</a>&nbsp;&nbsp;
                <a href="stat.php">Статистика</a>&nbsp;&nbsp;
                <a href="register.php">Зареєстровані</a>&nbsp;&nbsp;
                </b></font>
            </td>
        </tr>
        <tr>
            <td width="20%" valign="top" >
            <center><canvas id = "canvas" height ="120" widht = "120"> </center>
            <font size="5" color="navy"><h2>Новини</h2></font>
                <font size="5">
                    <ul>
                     <li><a href="#">Сайт будівельної компанії</a></li>
                     <li><a href="#">Сайт ТМ "Нова школа"</a></li>
                     <li><a href="#">Редизайн сайту classno.com.ua</a></li>
                     <li><a href="#">Розробка CMS для Metro Cash&Carry</a></li>
                     <li><a href="#">Сайт вызитка дизайнера інтерфейсів</a></li>
                     <p align="right"><a href="#">інші...</a></p>
                    </ul>
                </font>
                <hr>
                <h1 align="center"><font color="green">Реєстрація</font></h1>
                <form action="forma.php" method="post" onsubmit="return send();">
                <table align="center" bgcolor="#ccc">
                    <tr>
                        <td><font color="green">Прізвище </font>: </td>
                        <td><input type="text" size="10" maxlength="20" name="name2"></td>
                    </tr>  
                    <tr>
                        <td><font color="green">Im'я</font>: </td>
                        <td><input type="text" size="10" maxlength="20" name="name1"></td>
                    </tr> 
                    <tr>
                        <td><font color="green">E-Mail</font>: </td>
                        <td><input type="text" size="10" maxlength="20" name="email"></td>
                    </tr> 
                    <tr>
                        <td><font color="green">Пароль</font>: </td>
                        <td><input type="text" size="10" maxlength="20" name="password"></td>
                    </tr>    
                </table>
                <p align="center">
                    <input type="submit" value="Зареєструватись">
                    <input type="reset" value="Очистити">
                </p>
                </form>
                <hr>
            </td>
            <td width="60%">
            <?php
            $db_conn = mysqli_connect("localhost", "root", "1", "tel09");
            mysqli_set_charset($db_conn, 'utf8');
            
            $rez = "SELECT * FROM tel09 WHERE ";
            $stre = "SELECT * FROM street WHERE ";
            
            $r1 = 0;
            $num = 0;
            
            $ntel = $_POST['ntel'];
            $fio = $_POST['fio'];
            $street = $_POST['street'];
            $ndom = $_POST['ndom'];
            
            if ($fio != ""):
            $fio = strtoupper($fio);
                 $r1 = 1;
                 $rez = "$rez a_name LIKE '$fio%'";
            endif;
            
            if ($street != 0):
              if ($r1 == 1):
                 $rez = "$rez AND";
              endif;
                 $r1 = 1;
                 $rez = " $rez street = $street";
            endif;
            
            if ($ndom != ""):
              if ($r1 == 1):
                 $rez = "$rez AND";
              endif;
                 $r1 = 1;
                 $rez = " $rez house LIKE '$ndom%'";
            endif;
            
            if ($ntel != ""):
            $ntel = str_replace("-", "", $ntel);
              if ($r1 == 1):
                 $rez = "$rez AND";
              endif;
                 $r1 = 1;
                 $rez = " $rez phone LIKE '%$ntel%'";
            endif;
            ?>
            <table cellPadding=0 celSpacing=0 border = 0 align = "center">
                <body>
                <tr>
                  <td>
                    <table cellPadding=0 celSpacing=0 border = 0 widht = "100%">
                        <body>
                            <tr>
                               <td align = "middle" height = 52 widht = 600>
                                 <b><i> <font face = "Arial" size=+2>
                                 Teлефонний довідник м.Рівне </font></i></b>
                               </td>       
                            </tr>
                        </body>
                    </table>
                  </td>
                </tr>
                </body>
            </table>
         <center><b><font size =+1>Результат пошуку телефону &nbsp;&nbsp;&nbsp;&nbsp;<? echo "$ntel"?>
        </font></b></center>      
         <?php
         if (!$db_conn):
            echo "<strong>";
            echo "База даних тимчасово не працює.<br>";
            echo "<hr></strong>";
        else:
               if ($r1 == 1):
                $result = mysqli_query($db_conn,$rez) or die("Query failed1");
                $num = mysqli_num_rows($result);
               endif;
        endif;
        
               $i = 0;
            if ($num == 0 OR $r1 == 0){
            echo "<hr><center><strong>";
            echo "Книга не мiстить жодного запису.<br>";
            echo "</strong></center>";
        } else {
        
        $i = 0;
            if ($num > 500){
                        $num = 500;
            echo "<hr><center><strong>";
            echo "Ви не вiрно вказали данi для запиту.<br>";
            echo "Кiлькiсть записiв перевищує 500.<br>";
            echo "</strong></center>";}
            else  {
            echo "<hr><center><strong>";
            echo "Знайдено $num записів.<br>";
            echo "</strong></center>";}
            }
                echo "<CENTER><table border=3 color=red><tr>";
                echo "<th><b><font size=+1 color=#006600>Прiзвище</font></b></th>";
                echo "<th><b><font size=+1 color=#006600>Телефон</font></b></th>";
                echo "<th><b><font size=+1 color=#006600>Адреса</font></b></th>";
                
         while ($line = mysqli_fetch_array($result, MYSQLI_NUM)){
        
        echo "<tr><td><b>&nbsp;&nbsp;&nbsp;&nbsp;".$line[1];
        echo "</b></td><td><b>&nbsp;&nbsp;&nbsp;&nbsp;".$line[0];
        
        $st1="SELECT * FROM street WHERE n_street=".$line[2];
        $res_st = mysqli_query($db_conn,$st1) or die("Query failed");
        $lst = mysqli_fetch_array($res_st, MYSQLI_NUM);
        
        echo "</b></td><td><b>&nbsp;&nbsp;&nbsp;&nbsp;".$lst[1]."&nbsp;&nbsp;буд.".$line[3]." кв. ".$line[4];
        
        }
        echo "</b></table></CENTER>";
         ?>             
        </td>
        </tr>
        <tr>
            <td background="images/bg-3.jpg" colspan="2" valign="middle" height="90">
            <font size="4">Сайт розробив Ковальчук Олександр</font>
            </td>
        </tr>
    </table>     
    </body>
</html>
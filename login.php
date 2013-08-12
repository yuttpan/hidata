<? include_once "menu.php"; ?>
<html>

<body>
    
   <div class="page" id="page-index">
       
        <div class="span10"></div>
          <div class="span10"></div>
          <div class="span10"></div>
        <div class="hero-unit">
            <div class="row" align="center">
         <button class="command-button default">กรุณาเข้าระบบ</button>
            </div>
    <div class="row" align ="center">   
<form class ="form-inline" name="form1" method="post" action="checklogin.php">
    <div class="span4">
    <div class="input-control text" id="txtUsername">
<input type="text" name="txtUsername" />
<button class="btn-clear"></button>
    </div>
</div>
   <div class="span4">
        <div class="input-control password">
    <input type="password" name="txtPassword" id="txtPassword"  />
    <button class="btn-clear"> </button>
    </div>
</div>

  <div class="span10"></div>
  <div class="span10"></div>
   <input type="submit" value="ตกลง"/>
</form>
    </div>
    </div>   
   </div>
        </body>
</html>

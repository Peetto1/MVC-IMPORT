<!DOCTYPE html>
<html>
 <head>
  <title>How to Import XML Data into Mysql Table Using Ajax PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>
 <body>
  <br />
  <div class="container">
   <div class="row">
    <h2 align="center">Import XML Data into Mysql Table </h2>
    <br />
    <div class="col-md-9" style="margin:0 auto; float:none;">
     <span id="message"></span>
     <form action ='Import' method="post" id="import_form" enctype="multipart/form-data">
      <div class="form-group">
       <label>Select XML File</label>
       <input type="hidden" name='action' value='import'/>
       <input type="file" name="file" id="file" />
      </div>
      <br />
      <div class="form-group">
       <input type="submit" name="submit" id="submit" class="btn btn-info" value="Import" />
      </div>
     </form>
     <form action="Search" method="post" id ="search_form" enctype="multipart/form-data" >
     <input type="hidden" name='action' value='search'/>
        Search <input type="text" name="search"><br>
        <div class="form-group">
       <input type="submit" name="submit" id="submit1" class="btn btn-info" value="Import" />
      </div>
    </form>
        
    </div>
   </div>
  </div>
  <!-- <script src = "scripts/script.js"></script> -->
 </body>
</html>

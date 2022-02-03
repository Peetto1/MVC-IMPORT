<?php

  Route::set('index.php', function(){
    Index::CreateView("Index");
  });


  Route::set('Import', function(){

    Import::CreateView("Import");
  });

  Route::set('Search', function(){
    Search::CreateView("Search");
  });
?>

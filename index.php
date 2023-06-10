<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="/main.css">

  <title> Smart Mirror </title>

</head>

<body>

  <div class="container">

    <div class="header"> 
      <h1> Smart Mirror </h1>
      <img src="pictures/logohhn.jpg" alt="Logo HHN" width="30%" height="auto">
    </div>

    <div id="blueRow"> </div>

    <h2> Wetterbericht </h2>

    <div id="id283ff89afc2e0" a='{"t":"r","v":"1.2","lang":"de","locs":[3517],"ssot":"c","sics":"ds","cbkg":"rgba(35,85,156,1)","cfnt":"#FFFFFF","codd":"#1E88E5","cont":"#E0E0E0","stof":"7"}'>Wetterdatenquelle: <a href="https://wetterlabs.de/wetter_künzelsau/">https://wetterlabs.de/wetter_künzelsau/</a></div><script async src="https://static1.wetterlabs.de/widgetjs/?id=id283ff89afc2e0"></script>
    
    <div class="rssfeed">
    <?php 
    include "feedreader.php";
    echo rss2html("https://www.faz.net/rss/aktuell",4,100,1); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
      integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
      integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
      crossorigin="anonymous"></script>

  </div>

</body>

</html>
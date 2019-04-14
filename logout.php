<!DOCTYPE html>
<html lang="en">
<head> 
   <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
   <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
   <script src="semantic/dist/semantic.min.js"></script>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Welcome</title>

   <style>
      body{
         margin: 50px;
         background: linear-gradient(-90deg, #209cff, #68e0cf);
         background-size: 400% 400%;
         -webkit-animation: Gradient 15s ease infinite;
         -moz-animation: Gradient 15s ease infinite;
         animation: Gradient 15s ease infinite;
   }
   </style>
</head>
<body>

<!-- Navbar -->
<div class="ui container">
   <div class="ui transparent menu" style="border-radius: 10px;">
      <div class="right menu">
         <a href="#" class="item">
            <i class="sign out icon"></i> Log Out
         </a>
      </div>
   </div>
</div>

<div class="ui raised padded container segment" style="border-radius: 10px; margin:50px;"> 
      <!-- Card Profile -->
      <div class="ui centered grid">
         <div class="four wide column">
         <h1>Welcome</h1>
            <div class="ui blue fluid card">
               <div class="image">
                  <img class="ui medium circular image" src="./asset/same.png" alt="">
               </div>
               <!-- Defining biodata -->
               <div class="content">
                  <div class="header description" style="font-size:20px;, cursor: alias;">Yoga Rizqi Azizan</div>
                  <div  class="description" style="font-size:15px;">Magelang, Jawa Tengah</div>
               </div>
               <div class="content">
                  <a>Universitas Negeri Malang</a>
               </div>
            </div>
         </div>
         <div class="eight wide column">
         <div class="ui container">
         <button class="ui blue right floated labeled icon button" onclick="window.location.href='/hal-teks.php'"> 
            <i class="right arrow icon"></i>
            Teks Eksposisi
         </button>
            <div class="ui blue top attached tabular menu">
               <a class="ui blue item active">Profile</a>
            </div>
            <div class="ui blue segment">
               <a class="ui red header" style="font-size:30px;">Tentang Saya</a>
               <div class="sub-header">
               <a class="ui third header" style="margin:30px;"></a>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
               </div>
            </div>
            <div class="ui blue top attached tabular menu">
               <a class="item blue active">Pendidikan</a>
            </div>
            <div class="ui blue segment">
               <a class="ui red header"> </a>
               <div class="sub-header">
               <a class="ui red header" style="font-size:30px;">Riwayat Pendidikan</a>
               <div class="ui list" style="margin:30px;">
                  <div class="item">
                     <li><div class="header">SD Negeri 2 Magelang</div></li>
                     1996 - 2002
                  </div>
                  <div class="item">
                     <li><div class="header">SMP Negeri 2 Magelang</div></li>
                     2002 - 2005
                  </div>
                  <div class="item">
                     <li><div class="header">SMA Negeri 2 Magelang</div></li>
                     2005 - 2008
                  </div>
                  <div class="item">
                     <li><div class="header">S1 Sastra Indonesia Universitas Negeri Malang</div></li>
                     2008 - 2012
                  </div>
                  <div class="item">
                     <li><div class="header">S2 Sastra Indonesia Universitas Negeri Malang</div></li>
                     2012 - 2014
                  </div>
               </div>
               </div>
            </div>
         </div>
         </div>
      </div>   
</div>
<div class="ui vertical footer segment">
    <div class="ui container" style="color: white;">
        Kreaktif 2019. Hak Cipta Dilindungi
    </div>
</div>      
</body>
</html>
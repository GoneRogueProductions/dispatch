<style> .userlink { color:white!important; text-decoration:none; } #cont { width:auto; border-radius:10px; } </style>
 <script> 
 function ajax(div,file) { 
     console.log(div,file); 
     const xhttp = new XMLHttpRequest(); 
     xhttp.onload = function() { document.getElementById(div).innerHTML = this.responseText; } 
     xhttp.open("GET", file, true); xhttp.send(); } 
     function hov(name,id) { ajax(id,('user.php?u='+name+'&api=true')); } 
     function nomorehov(div) { document.getElementById(div).innerHTML=null; } </script>
<html>
<head></head>
<body>
 <div          id="txt">
   <script     id="txt0"> x=0 </script>
   <noembed    id="txt1"> 1   </noembed>
   <noframes   id="txt2"> 2   </noframes>
   <noscript   id="txt3"> 3   </noscript>
   <div        id="txt4"> 4   </div>
   <div>
     <noscript id="txt5"> 5   </noscript>
   </div>
   <span       id="txt6"> 6   </span>
 </div>
 <div id="innerHTMLtxt"></div>
<div id="textContenttxt"><div>
<script> 
  for (i=0;i<7;i++){ 
    x="txt"+i; 
    document.getElementById(x).firstChild.nodeValue='&<>'
  }
 
document.getElementById("innerHTMLtxt").textContent=document.getElementById("txt").innerHTML
document.getElementById("textContenttxt").textContent=document.getElementById("txt").textContent
</script>
<body>
</html>
<?php
$to = 'Test@gmail.com';
$ann='Message erreur';
$mess='   <html>
      <head>
       <title>Calendrier des anniversaires pour Août</title>
      </head>
      <body>
       <p>Voici les anniversaires à venir au mois d\'Août !</p>
       <table>
        <tr>
         <th>Personne</th><th>Jour</th><th>Mois</th><th>Année</th>
        </tr>
        <tr>
         <td>Josiane</td><td>3</td><td>Août</td><td>1970</td>
        </tr>
        <tr>
         <td>Emma</td><td>26</td><td>Août</td><td>1973</td>
        </tr>
       </table>
      </body>
     </html>
    ';
$headers[]= "From:<lempereurJulien@gmail.com>";
$headers[]="Mime-Version: 1.0";
$headers[]="Content-type: text/html; charset=iso-8859-1";

mail($to,$ann, $mess,implode("\r\n",$headers));


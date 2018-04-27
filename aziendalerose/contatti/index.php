<?php
$url="../";

$title="Contattaci!";
$metaDescription="Invia un messaggio all'Azienda agricola Le Rose";
$metaKeywords="contatti messaggio azienda agricola le rose serra riccò";
$metaRobots="ALL";

include "../inc/head.php";

// form contatto
function print_form($autore,$email,$testo) {
?>
<form id="messaggio" method="post" action="?" class="posta">
<p>
<br/>
<table>

<tr>
<td width="27%" class="label vtop"><label>Il tuo nome:</label></td>
<td width="3%"></td>
<td width="70%" class="vtop">
<input type="text" size="40" name="autore" value="<?php print $autore; ?>">
</td>
</tr>

<tr>
<td class="label vtop"><label>La tua <i>E-mail</i>:</label></td>
<td></td>
<td class="vtop">
<input type="text" size="40" name="email" value="<?php print $email; ?>">
</td>
</tr>

<tr>
<td class="label vtop"><label>Il tuo messaggio:</label></td>
<td></td>
<td class="vtop">
<textarea name="testo" rows="10" cols="50" class="input"><?php print $testo; ?></textarea>
</td>
</tr>

<tr>
<td></td>
<td></td>
<td class="vtop">
<input type="submit" name="azione" value=" INVIA IL MESSAGGIO " id="invia" class="invia" />
</td>
</tr>
</table>

</p>
</form>
<?
}

// invio email
function invia_email($autore,$email,$testo) {
$to="az.agricola.lerose@fastwebnet.it";
$subject="messaggio di: ".$autore." - ".$email;
$body=$testo;
@mail($to,$subject,$body);
}

?>
<h2>Contattaci!</h2>

	   <?php
        // visualizza form
        if (!isset($autore)){
        print_form("","","");
        }
        // controlli e salvataggio
        else{
        if (!isset($msg)){$msg="";}
		
		// funzioni controllo
		if ($autore==""){ $msg="Devi scrivere il tuo nome!"; }
		if ($testo==""){ $msg="Devi inserire un testo!"; }
		                    
          if ($msg!=""){ 
          $msg="ATTENZIONE! ".$msg; 
          echo "<script language=\"JavaScript\">\n";
          echo "alert(\"$msg\");\n"; 
          echo "</script>"; 
          print_form($autore,$email,$testo); 
          }
        
          if ($msg==""){
		  invia_email($autore,$email,$testo);
		  print "<p>Grazie per averci inviato il tuo messaggio. Ti risponderemo quanto prima possibile.</p>";
		  }
		  
		}
		  ?>


<?php
include "../inc/footer.php";
?>

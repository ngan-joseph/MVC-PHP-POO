<?php $this->titre = 'Gestion des eleves'; ?>
<h1 id="titre">Liste des élèves</h1>
<table border="7px" >
	<tr >
		<th>CNE</th>
		<th>NOM</th>
		<th>PRENOM</th>
        <th>PHOTO</th>
        <th>ETAT</th>
	</tr>
<?php
foreach ($eleves as $eleve) {
	$et="";
	$lien="";
	if($eleve["etat"]=="true") {
		$et="active";
		$lien="index.php?action=activer&cneeleve=".$eleve["cne"]."&etat=false"; }
	else {
		$et="desactive";
		$lien="index.php?action=activer&cneeleve=".$eleve["cne"]."&etat=true"; }
	?>
		<tr>
		<td><?php echo $eleve["cne"]; ?></td>
		<td><?php echo $eleve["nom"]; ?></td>
		<td><?php echo $eleve["prenom"]; ?></td>
        <td ALIGN="center"><img height="60px" width="90px" src="<?php echo $eleve["photo"]; ?>"/></td>
		<td><a href="<?php echo $lien; ?>"><?php echo $et; ?></a></td>
		<td><a href ="<?= "index.php?action=eleve&cneeleve=".$eleve['cne'] ?>"><button type='button'>
      Details</button></a></td>
	</tr>
	<?php	
}  ?>
</table>


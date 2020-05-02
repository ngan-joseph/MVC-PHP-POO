<?php $this->titre="Gestion des eleves - " .$eleve['nom']; ?>
<article>
<header>
<h1 class="nomeleve"><?= $eleve['nom'] ?></h1>
<h1 class="nomeleve"><?= $eleve['prenom'] ?></h1>
</header>
<p>CNE°<?= $eleve['cne'] ?></p>
<p><img height="70px" width="90px" src="<?php echo $eleve["photo"]; ?>"/></p>
<p>ETAT:<?= $eleve['etat'] ?></p>
</article>
<hr />
<header>
<h1 id="absence">Recapitulatif des absences de <?= $eleve['nom'] ?></h1>
</header>
<table border="5px">
	<tr>
		<th>MATIERE</th>
		<th>DATE</th>
        <th>NOMBRE_heure</th>
</tr>
<?php foreach ($absences as $absence): ?>
    <tr>
		<td><?php echo $absence["code_matiere"]; ?></td>
		<td><time><?php echo $absence["date"]; ?></time></td>
        <td><?php echo $absence["nombre_heure"]; ?></td>
</tr>
<?php endforeach; ?>
</table>
</br>
<h1 id="absence">Le total des absences par matiere de <?= $eleve['nom'] ?></h1>
<table border="5px">
	<tr>
		<th>MATIERE</th>
        <th>TOTAL</th>
</tr>
<?php foreach ($Tabsences as $Tabsence): ?>
    <tr>
		<td><?php echo $Tabsence["code_matiere"]; ?></td>
        <td><?php echo $Tabsence["sum(nombre_heure)"]; ?></td>
</tr>
<?php endforeach; ?>
</table>
<h1 id="absence">TOTAL</h1>
<?php foreach ($Tabsencess as $Tabsence): ?>
<?php echo $Tabsence["sum(nombre_heure)"]; ?> Heure(s)<hr />
<?php endforeach; ?>
<form method="post" action="index.php?action=ajouter">
<input id="code_matiere" name="matiere" type="text" placeholder="code de la matiere"
required /><br />
<input id="nombre_heure" name="heure" placeholder="nombre d heure" required><br />
<input type="hidden" name="cneeleve" value="<?= $eleve['cne'] ?>" />
<input type="submit" value="ajouter" />
</form>
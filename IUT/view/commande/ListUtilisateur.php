<?php
    foreach ($tab_v as $v) // Display of the cars stored in $tab_v
    echo "User <a href=http://webinfo.iutmontp.univ-montp2.fr/~sonettir/PHP/TD2/index.php?action=read&controller=utilisateur&login=".rawurlencode($v->getLogin()).">".htmlspecialchars($v->getLogin())."</a> <a href=http://webinfo.iutmontp.univ-montp2.fr/~sonettir/PHP/TD2/index.php?action=delete&controller=utilisateur&login=".rawurlencode($v->getLogin()).">Delete User</a> <br>";
//rawurlencode() permet d'eviter URL injection, htmlspecialchars permet d'éviter SQL injection
?>
<a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/PHP/TD2/index.php?action=create&controller=utilisateur">Créer Utilisateur</a>

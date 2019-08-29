<?php

print_r($_SERVER);

?>

<table border=1>
    <thead>
        <tr>
            <th>Chave</th>
            <th>Valor</th>
        </tr>
    </thead>
    </tbody>
    <?php foreach ($_SERVER as $key => $value) { ?>
        <tr>
            <td> <?= $key ?> </td>
            <td> <?= $value ?> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

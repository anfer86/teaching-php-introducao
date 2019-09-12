<?php
$host = "acad01.lages.ifsc.edu.br";
$username = "aluno1";
$passwd = "aluno";
$dbname   = "dbcep";
$port = "3306";
// Abre a conexão com mysql
$conn = $conn = mysqli_connect($host, $username, $passwd, $dbname, $port);
$conn->set_charset("utf8");

$sql = 'SELECT cep, logradouro, bairro 
        FROM cep INNER JOIN cidade ON cep.id_cidade = cidade.id_cidade 
        WHERE cidade.nome = "Lages"';
$stmt = $conn->prepare($sql);
// Executa a consulta SQL
$stmt->execute();
// Salva uma referência para do resultado da consulta na variável $result
$result = $stmt->get_result();

/**
 * A função fetch_assoc retorna o próximo registro da consulta
 * na forma de um array do tipo $key => $value. Quando não houverem
 * mais registros da consulta a função retorna NULL. Quando a condição
 * retorna NULL o PHP entende como um `false` e abandona a repetição.
 * Assim, vamos fazer um loop while que enquanto houver resultados
 * para consumir (fetch) vai salvar os resultados no array $instances.
 */
$instances = [];
while ($row = $result->fetch_assoc()){
    $instances[] = $row;
}

$stmt->close();    
$conn->close();

/**
 * Todos os registros estão na variável $instances. 
 * Agora vamos mostrar os dados no formato de uma lista.
*/
foreach ($instances as $instance){ ?>
    <li><?= implode( array_values($instance), ' - ' ) ?></li>
<?php } ?>


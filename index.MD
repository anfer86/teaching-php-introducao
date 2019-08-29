<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="jquery_preventDefault.js"></script>

# PHP

## Embutindo PHP em HTML

Códigos em HTML e PHP podem conviver no mesmo documento. No entanto, o código PHP será processando pelo interpretador do PHP antes de ser enviado para o cliente. Se colocarmos código HTML e PHP em um arquivo só, o resultado que verá o cliente será apenas código HTML.

Vejamos o exemplo. Dentro de sua pasta no ``C:\xampp\htdocs\seu_nome\php\` crie um arquivo chamado `exemplo_1.php`, com o seguinte conteúdo: 

```html
<p>Isto será ignorado pelo interpretador de PHP.</p>
<p><?php echo 'Isto será interpretado e o resultado traduzido para HTML.'; ?></p>
<p>Isto também será ignorado pelo interpretador de PHP.</p>
```

O resultado disto será:
```html
<p>Isto será ignorado pelo interpretador de PHP.</p>
<p>Isto será interpretado e o resultado traduzido para HTML.</p>
<p>Isto também será ignorado pelo interpretador de PHP.</p>
```

Criar um novo arquivo chamado `exemplo_2.php`, com o seguinte conteúdo:

```html
<?php
$titulo = "Exemplo 2";
$nome = "Carlos Andres Ferrero";
?>
<html>
<head>    
        <title><?php echo $titulo ?></title>
</head>

<body>
    <h2>Bom dia <?php echo $nome ?></h2>

    <p>Isto será ignorado pelo interpretador de PHP.</p>
    <p><?php echo 'Isto será interpretado e o resultado traduzido para HTML.'; ?></p>
    <p>Isto também será ignorado pelo interpretador de PHP.</p>
</body>
</html>
```

Utilizamos a palavra `echo` para mostrar algum conteúdo na página HTML. Estamos indicando para o interpretador que o que segue a `echo` tem que ser resolvido e o resultado apresentado ao cliente.

O resultado que será apresentado ao cliente, após a interpretação do código em PHP pelo servidor, será a seguinte:

```html
<html>
<head>    
        <title>Exemplo 2</title>
</head>

<body>
    <h2>Bom dia Carlos Andres Ferrero</h2>

    <p>Isto será ignorado pelo interpretador de PHP.</p>
    <p>Isto será interpretado e o resultado traduzido para HTML.</p>
    <p>Isto também será ignorado pelo interpretador de PHP.</p>
</body>
</html>
```

Para mostrar o resultado de uma variável ou uma expressão em PHP embutido em HTML também podemos fazer da seguinte forma:

```html
<?php
$titulo = "Exemplo 2";
$nome = "Carlos Andres Ferrero";
?>
<html>
<head>    
        <title><?= $titulo ?></title>
</head>

<body>
    <h2>Bom dia <?= $nome ?></h2>

    <p>Isto será ignorado pelo interpretador de PHP.</p>
    <p><?='Isto será interpretado e o resultado traduzido para HTML.'; ?></p>
    <p>Isto também será ignorado pelo interpretador de PHP.</p>
</body>
</html>
```

Essa forma alternativa de implementar a saída de dados, irá apresentar o mesmo resultado final. A principal diferente entre uma forma e outra é que a primeira forma `<?php ?>` é utilizar para executar várias linhas de código dentro dela, como ocorre nas primeiras 4 linhas do exemplo, enquanto que a segunda form é utilizada apenas para retornar ou mostrar resultados.

Quando for de interesse fazer comentários serão feitos da seguinte forma:

```html
<?php
// Este é um comentário de uma linha

/*
* Este é um comentário 
* de várias linhas
*/
$titulo = "Exemplo 2";
$nome = "Carlos Andres Ferrero";
?>
<html>
<head>    
        <title><?= $titulo ?></title>
</head>
<!-- 
    E este é um comentário em HTML
-->
<body>
    <h2>Bom dia <?= $nome ?></h2>

    <p>Isto será ignorado pelo interpretador de PHP.</p>
    <p><?='Isto será interpretado e o resultado traduzido para HTML.'; ?></p>
    <p>Isto também será ignorado pelo interpretador de PHP.</p>
</body>
</html>
```

Observe que os comentários em PHP e HTML tem sintaxe diferentes, tem que respeitar cada um deles.

## Tipos de Dados

Os princiapsi tipos de dados são *escalares* e *compostos*.

### Tipos Escalares

Os *escalares* são:
- `boolean`
- `integer`
- `float` (número de ponto flutuante, ou também double)
- `string`

Podemos explorar esses tipos de dados com o seguinte código PHP (crie um arquivo `tipos_escalares.php`):

```php
<?php // tipos_escalares.php
$carrinhoVazio = FALSE;             // boolean
$quantidadeUnidades = 5;            // inteiro
$valorUnidade = 12.50;              // float
$nomeProduto = 'Capa de Celular';   // string

echo gettype($carrinhoVazio) . '<br>';
echo gettype($quantidadeUnidades) . '<br>';
echo gettype($valorUnidade) . '<br>';
echo gettype($nomeProduto) . '<br>';
echo '<br>';

if (is_bool($carrinhoVazio)){
    echo '$carrinhoVazio é uma variável booleana <br>';
} 

if (!is_bool($nomeProduto)) {
    echo '$nomeProduto não é uma variável booleana <br>';
}

if (is_int($quantidadeUnidades)){
    echo '$quantidadeUnidades é uma variável int <br>';
}

if (is_float($valorUnidade)){
    echo '$valorUnidade é uma variável float <br>';
}

if (is_numeric($valorUnidade) && is_numeric($quantidadeUnidades)){
    echo '$valorUnidade e $quantidadeUnidades são variáveis numéricas<br>';
}

if (is_string($nomeProduto)){
    echo '$nomeProduto é uma variável string <br>';
}
?>
```

A função `gettype` retorna o tipo da variável e as funções `is_bool`, `is_int`, `is_float` e `is_string` servem para verificar se as nossas variáveis são de um determinado tipo. Essas funções são importantes para verificar em nossas funções se os argumentos enviados como parâmetro são do tipo que nós esperamos que seja. 

Por exemplo, se criamos uma função `function soma($a, $b) { return $a + $b}`, apenas irá funcionar para números inteiros ou em ponto flutuante, mas para variáveis do tipo string não vai funcionar. Vejamos:

```php
<?php // tipos_escalares_soma.php

function soma($a, $b) { return $a + $b; }

echo 'soma (1,5): ' . soma(1,5) . '<br>';
echo "soma('Andres','Ferrero'): " .  soma("Andres",'Ferrero') . '<br>';
?>
```

O resultado será o seguinte:
> soma (1,5): 6<br><br />
<b>Warning</b>:  A non-numeric value encountered in <b>C:\xampp\htdocs\introducao_php\tipos_escalares_soma.php</b> on line <b>3</b><br />
<br />
<b>Warning</b>:  A non-numeric value encountered in <b>C:\xampp\htdocs\introducao_php\tipos_escalares_soma.php</b> on line <b>3</b><br />
soma('Andres','Ferrero'): 0<br>

O primeiro `echo` é executado normalmente, pois a soma entre dois valores numéricos é o que a nossa função faz corretamente. Para executar o segundo `echo` o PHP precisa resolver antes a soma entre as duas palavras, no entanto a nossa função gera uma advertencia (um *warning*) erro no momento de executar a operação de soma. Um *warning* é um erro chamado de não-fatal, e não interrompe a execução do código PHP. Portanto, após o *warning* a execução continua e mostra o valor 0, como resultado da operação.

Para resolver isso, vamos usar as funções de verificação de tipo, da seguinte forma:

```php
<?php // tipos_escalares_soma2.php
function soma($a, $b) {    
    if ( !is_numeric($a) || !is_numeric($b) ){
        return "Erro: um ou mais argumentos não são numéricos";
    }
    return $a + $b; 
}

echo 'soma (1,5): ' . soma(1,5) . '<br>';
echo "soma('Andres','Ferrero'): " .  soma("Andres",'Ferrero') . '<br>';
echo "soma('Andres',10): " .  soma("Andres",10) . '<br>';
?>
```

E o resultado será o seguinte:
> soma (1,5): 6<br>
soma('Andres','Ferrero'): Erro: um ou mais argumentos não são numéricos<br>
soma('Andres',10): Erro: um ou mais argumentos não são numéricos<br>


### Tipos Compostos

Os tipos *compostos* são:
- `array`
- `object`
- `callable`

Um `array` permite armazenar dados de diferentes tipos em um coleção. Em PHP um `array` é tratado como um conjunto de elementos `chave => valor`. As chaves podem ser números inteiros ou strings e os valores de qualquer tipo, inclusive podem conter outros arrays.

Para mostrar o conteúdo de um `array` temos que usar uma função específica, chamada `print_r`. Vejamos alguns exemplos do que podemos armazenar neles e algumas operações que podemos fazer com eles.

```php
<?php // tipos_compostos_arrays.php

$arr_animais = array('gato','cachorro','pássaro');
print_r($arr_animais);
echo '<br>';

$arr_animais2 = ['gato', 'cachorro', 'pássaro'];
print_r($arr_animais2);
echo '<br>';

$arr_animais3 = [ 
    'Tomero' => 'gato', 
    'Rutini' => 'gato',
    'Toby' => 'cachorro',
    'Chico' => 'pássaro'
];
print_r($arr_animais3);
echo '<br>';

echo 'O Tomero é um ' . $arr_animais3['Tomero'] . '<br>';
echo 'O Chico é um ' . $arr_animais3['Chico'] . '<br>';

echo 'As keys são:   '. implode(', ', array_keys($arr_animais3)).'<br>';
echo 'Os values são: '. implode(', ', array_values($arr_animais3)).'<br>';

$keys = array_keys($arr_animais3);
echo  $keys[3] . ' é ' . $arr_animais3[$keys[3]] . '<br>';
echo  $keys[2] . ' é ' . $arr_animais3[$keys[2]] . '<br>';

if (in_array('Tomero', array_keys($arr_animais3))){
    echo 'Tomero está no array de animais <br>';
}

if (in_array('Duda', array_keys($arr_animais3))){
    echo 'Duda está no array de animais <br>';
} else {
    echo 'Duda não está no array de animais <br>';
}

$arr_animais3['Duda'] = 'pássaro';
if (in_array('Duda', array_keys($arr_animais3))){
    echo 'Duda está no array de animais <br>';
} else {
    echo 'Duda não está no array de animais <br>';
}

unset($arr_animais3);
echo 'Apagamos a variável $arr_animais3 <br>';
print_r($arr_animais3);

?>
```

O resultado esperado é:

> Array
(
    [0] => gato
    [1] => cachorro
    [2] => pássaro
)
<br>Array
(
    [0] => gato
    [1] => cachorro
    [2] => pássaro
)
<br>Array
(
    [Tomero] => gato
    [Rutini] => gato
    [Toby] => cachorro
    [Chico] => pássaro
)
<br>
O Tomero é um gato<br>
O Chico é um pássaro<br>
As keys são:   Tomero, Rutini, Toby, Chico<br>
Os values são: gato, gato, cachorro, pássaro<br>
Chico é pássaro<br>
Toby é cachorro<br>
Tomero está no array de animais <br>
Duda não está no array de animais <br>
Duda está no array de animais <br>
Apagamos a variável erray $arr_animais3 <br><br />
<b>Notice</b>:  Undefined variable: arr_animais3 in <b>C:\xampp\htdocs\introducao_php\tipos_compostos_arrays.php</b> on line <b>32</b><br />

Os `objetos` são tipos complexos de dados nos quais podemos armazenar dados, chamado atributos, e executar funções, chamadas métodos.

Os `callables` ou `callbacks` são também tipos de dados complexos que permitem armazenar funções. Em PHP podemos chamar uma função sabendo apenas o nome dela.

```php
<?php // tipos_compostos_callable.php
function bemvindo() {
    echo 'Olá Mundo!' . '<br>';
}

call_user_func('bemvindo');

$bemvindo = function($nome){
    echo 'Olá '. $nome . '!' . '<br>';
};

$bemvindo('Andres');

echo '<br>';
array_map($bemvindo, ['Andres','Tomero','Rutini']);
?>
```

Resultado esperado:

>Olá Mundo!<br>
Olá Andres!<br>
Olá Andres!<br>
Olá Tomero!<br>
Olá Rutini!<br>

## Variáveis

As variáveis no PHP são definidas com um cifrão (`$`) seguido pelo nome da variável. Os nomes de variável são case-sensitive. Isto significa que `$nome` e `$Nome` são variáveis diferentes, pois ele diferencia maiúsculas e minúsculas.

Um ponto importante em PHP é que a mesma variáveis pode assumir diferentes tipos de dados ao longo de seu tempo de vida. Inicialmente pode ser um número inteiro, depois passar para float, ser uma string e depois virar uma objeto. No entanto, recomenda-se não usar a mesma variável para armazenar varios dados ao longo do programa, pois pode confundir o programador no uso da variável.

```php
<?php // variaveis_tipo_dinamico.php

function msg_tipo_variavel($var_name){
    echo 'O tipo da variável é ' . gettype($var_name) . '<br>';
}

$i = 1;
msg_tipo_variavel($i);

$i = 1.6;
msg_tipo_variavel($i);

$i = 'Olá Mundo';
msg_tipo_variavel($i);

$i = ['gato','cachorro','pássaro'];
msg_tipo_variavel($i);

$nome = 'Andrés';
echo 'Meu nome é ' . $nome . '<br>';
echo "Meu nome é $nome \n";

?>
```

Observe as duas formas de mostrar conteúdo de uma variável. Usando aspas simples temos que concatenar as strings com `.`. Já utilizando aspas duplas podemos colocar o nome da variável dentro e essa variável será resolvida antes e assim será apresentado o resultado ao usuário.

O resultado será:
> O tipo da variável é integer<br>
O tipo da variável é double<br>
O tipo da variável é string<br>
O tipo da variável é array<br>
Meu nome é Andrés<br>
Meu nome é Andrés<br>

Também existe variáveis de fontes externas. As mais comuns são `$_POST` e `$_GET` que provém de formulários em HTML. Para testar cada uma delas vamos construir dois formulários simples em uma página HTML, um que envie os dados via GET e outro via POST para uma página PHP.

```html
<!-- variaveis_externas_formulario.html -->
<html>
<head>
    <title>Get e Post</title>
</head>
<body>
<form action="variaveis_externas.php" method="get">
    Nome:  <input type="text" name="username" /><br />
    Email: <input type="text" name="email" /><br />
    <input type="submit" name="submit" value="Send" />
</form>
<br>
<form action="variaveis_externas.php" method="post">
    Nome:  <input type="text" name="username" /><br />
    Email: <input type="text" name="email" /><br />
    <input type="submit" name="submit" value="Send" />
</form>
</body>
</html>
```

Resultado:
<form action="variaveis_externas.php" method="get">
    Nome:  <input type="text" name="username" /><br />
    Email: <input type="text" name="email" /><br />
    <input type="submit" name="submit" value="Send" />
</form>
<br>
<form action="variaveis_externas.php" method="post">
    Nome:  <input type="text" name="username" /><br />
    Email: <input type="text" name="email" /><br />
    <input type="submit" name="submit" value="Send" />
</form>

Neste formulário estamos enviando os dados para um arquivo PHP chamado `variaveis_externas.php`, que irá processar o conteúdo enviado via POST e via GET, da seguinte forma:

```php
<?php 
// variaveis_externas.php
if (!empty($_GET)){
    echo "Recebemos dados via GET: ";
    print_r($_GET);
}

if (!empty($_POST)){
    echo "Recebemos dados via POST: ";
    print_r($_POST);
}
?>
```

Outra variável importante é `$_SERVER`. Esta variável contem informações sobre a requisição HTTP que está sendo feita pelo cliente e também contém informações sobre o servidor em que está ordando Apache e o interpretador PHP. A variável `$_SERVER` é um array do tipo `$key => $value` ou chave => valor. Vamos ver o conteúdo dessa variável usando a função `print_r`, como no exemplo abaixo:

```php 
// variavel_server.php
print_r($_SERVER);
```

Ao acessar esse arquivo pelo browser vamos observar muitas informações, o que torna difícil a compreensão do conteúdo desse array. Com isso, vamos aproveitar a vantagem de poder combinar código HTML e PHP e criar uma tabela com os dados contidos nessa variável. Como o formato do array é do tipo `$key => $value` vamos criar uma tela onde a primeira coluna é a `$key` e a segunda coluna é o `$value`.

```html
<!-- variavel_server.php -->
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
```

Ao acessar essa página no browser ela deverá mostrar os dados da variável `$_SERVER` no formato de uma tabela. Algumas variáveis contidas em `$_SERVER` vão variar de acordo com o browser que utilizarmos. 

Vamos colocar o arquivo `variavel_server.php` no servidor da instituição (acad01.lages.ifsc.edu.br). Para isso, vamos copiar o nosso arquivo local e copiá-lo na pasta pessoal de cada um dentro desse servidor. Assim, ficará em um endereço parecido com o seguinte `acad01.lages.ifsc.edu.br/aluno1/seu_nome/variavel_server.php`. Após isso, acesse esse endereço utilizando os seguintes meios:
- Google Chrome (PC)
- Mozilla Firefox (PC)
- Google Chrome (Mobile): verifique se o seu celular está na rede interna do IFSC.

## Estruturas de Controle

As princiapsi estruturas de controle de fluxo são:
- *if*
- *while*
- *for*
- *forach*
- *switch case*

A estrutura de de controle *if* é uma estrutura condicional que permite desviar o nosso programa para executar um sequência de instruções se uma condição for satisfeita ou não. Essa estrutura é muito comum em qualquer linguagem de programação. Para lembrar a estrutura dela vamos construir uma página de autenticação por palavra-chave. Para isso vamos construir três arquivos:
- `formulario_autenticacao.php`: uma página que contém um formulário para que o usuário escreva a palavra-chave;
- `area_restrita.php`: esta página será apresentada apenas se o usuário digitou a palavra chave corretamente.
- `autenticacao.php`: responsável por verificar se o usuário digitou a palavra-correta e o encaminhará para a area restrita;

Neste primeiro arquivo apresentamos um formulário simples em HTML que permita ao usuário digitar a palavra-chave.

```html
<!-- formulario_autenticacao.php -->
<html>
<head>
    <title>Formulário Autenticação</title>
</head>
<body>
<p>Você está querendo entrar em uma área restrita, por favor digite a palavra-chave</p>
<form action="autenticacao.php" method="post">
    Palavra-chave: <input type="text" name="palavra_chave" />
    <br>    
    <input type="submit" value="Enviar" />
</form>
</body>
</html>
```

Observe que o formulário estará enviando a palavra-chave digitada pelo usuário para `autenticacao.php` via POST. O resultado da nossa página será o seguinte:

<html>
<head>
    <title>Formulário Autenticação</title>
</head>
<body>
<p>Você está querendo entrar em uma área restrita, por favor digite a palavra-chave</p>
<form action="autenticacao.php" method="post">
    Palavra-chave: <input type="text" name="palavra_chave" />
    <br>    
    <input type="submit" value="Enviar" />
</form>
</body>
</html>

O segundo arquivo irá receber os dados enviados via POST e verificar se a palavra-chave é a correta e, caso seja, encaminhar o usuário para a área restrita.

```php 
// autenticacao.php
<?php
// Verificar se foi enviada a palavra_chave via POST.
if ( isset($_POST['palavra_chave']) ){    
    $palavra_chave = $_POST['palavra_chave'];    
    // Verificar se a palavra chave é a correta
    if ( $palavra_chave == "123mudar"){
        header("Location: area_restrita.php");
    }    
}
?>
```

Nesse arquivo primeiro verificamos

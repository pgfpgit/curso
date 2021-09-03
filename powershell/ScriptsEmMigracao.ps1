$ErrorActionPreference = "Stop" 

#Aqui a criamos um hashtable para a coluna do nome
$nameExpr = @{
    Label = "Nome";
    Expression = { $_.Name }
}

#Tambem montamos um hashtable para o tamanho
$lengthExpr = @{
    Label = "Tamanho";
    Expression = { "{0:N2}KB" -f ($_.Length / 1KB) }
}

#Criamos um array com as variáveis
$params = $nameExpr, $lengthExpr

$resultado=
    gci -Recurse -File |
        ? Name -like "*_migrando_*" |
        select $params
    
$estilos = Get-Content d:\curso\powershell\styles.css
$styleTag = "<style> $estilos </style>"
$tituloPagina = "Relatorio de Scripts em Migracao"
$tituloBody = "<h1> $tituloPagina </h1>"

$resultado | 
    ConvertTo-Html -Head $styleTag -Title $tituloPagina -Body $tituloBody | 
    Out-File d:\curso\powershell\relatorio.html 
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

gci -Recurse -File |
    ? Name -like "*_migrando_*" |
    select $params
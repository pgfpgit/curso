$nameExpr = @{
    Label = "Nome";
    Expression = { $_.Name }
}

$lengthExpr = @{
    Label = "Tamanho";
    Expression = { "{0:N2}KB" -f ($_.Length / 1KB) }
}

$params = $nameExpr, $lengthExpr

gci -Recurse -File |
    ? Name -like "*_migrando_*" |
    select $params
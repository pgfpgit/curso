gci -Recurse -File | Where-Object Name -like "*_migrando_*" | Select-Object Name, { "{0:N2}KB" -f ($_.Length / 1KB) } 


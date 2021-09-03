gci -Recurse -File | Where-Object Name -like "*_migrando_*" | Select-Object Name, Length


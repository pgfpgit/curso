@ECHO OFF
echo Buscando serviço "ByteBank Interface Service" no servidor SRV01
sc \\SVR01 query "ByteBank Interface Service" |find /i "state" |find /i "running"

IF %ERRORLEVEL% NEQ 0 (
    echo Parando serviço...
    sc \\SRV01 stop "ByteBank Interface Service" > NUL
    echo Iniciando serviço...
    sc \\SRV01 start "ByteBank Interface Service" > NUL
    echo Serviço Reiniciado com sucesso!
)
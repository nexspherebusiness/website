# build.sh
#!/bin/bash

# Defina as permissões corretas para os arquivos que você precisa
chmod +x build.sh
./build.sh && npm run build

chmod +x sendemail.php  # Exemplo: Torna o arquivo executável (se necessário)

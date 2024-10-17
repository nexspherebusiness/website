#!/bin/bash

# Exibir uma mensagem inicial para depuração
echo "Iniciando o build..."

# Exibir o ambiente para depuração
echo "Informações do ambiente: "
echo "Diretório de trabalho: $(pwd)"
echo "Conteúdo do diretório: $(ls -la)"

# Verificar se o npm está instalado
if ! command -v npm &> /dev/null
then
    echo "Erro: npm não encontrado. Instale o Node.js e npm e tente novamente."
    exit 1
fi

# Instalar dependências do npm
echo "Instalando dependências..."
npm install

# Verificar se o comando npm run build existe
if ! npm run build &> /dev/null
then
    echo "Erro: Não foi possível executar 'npm run build'. Verifique se o script 'build' está no seu package.json."
    exit 1
fi

# Executar o comando de build
echo "Executando o build..."
npm run build

# Verificar se o build foi bem-sucedido
if [ $? -eq 0 ]; then
    echo "Build concluído com sucesso!"
else
    echo "Erro no processo de build."
    exit 1
fi

# Fim do script
echo "Build finalizado."

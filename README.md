🚀 Gestor de Produtos - Processo Seletivo Autogestor

Um sistema web completo para gerenciamento de produtos, categorias e marcas, construído com o framework Laravel. O projeto conta com um sistema de autenticação robusto e autorização baseada em permissões, separando as funcionalidades disponíveis para administradores e gestores.

✨ Funcionalidades Principais

    Autenticação Completa: Sistema de Login, Registro e Logout de usuários.

    Listagens Públicas: Páginas para visualização de produtos, categorias e marcas para todos os visitantes.

    Dashboard Personalizado: Uma área de painel de controle que se adapta ao perfil do usuário logado.

    Sistema de Permissões Detalhado:

        Administrador: Possui uma visão global e pode gerenciar todos os usuários e suas respectivas permissões de acesso.

        Gestor: Usuário não-administrador com acesso a painéis de consulta específicos (produtos, categorias e/ou marcas) de acordo com as permissões definidas pelo admin.

        Usuario comum: Acesso as funções básicas do programa

    Interface Moderna e Responsiva: Todas as telas, dos formulários às tabelas de dados, foram estilizadas para oferecer uma experiência de usuário limpa e profissional.

🛠️ Ambiente e Ferramentas Utilizadas

Este projeto foi desenvolvido utilizando um ambiente de desenvolvimento moderno e eficiente, mas pode ser adaptado para outros sistemas.

    Framework Principal: Laravel

    Ambiente de Desenvolvimento Local: Laravel Herd

    Banco de Dados: MySQL (gerenciado através do DBngin)

    Cliente de Banco de Dados (Opcional): TablePlus foi utilizado para gerenciamento e visualização direta do banco de dados.

⚙️ Instalação e Configuração

Siga os passos abaixo para configurar e executar o projeto em seu ambiente local.

Pré-requisitos

    PHP (versão 8.2 ou superior)

    Composer

    Node.js e NPM

    Laravel Herd (recomendado para macOS) ou outro ambiente local (Laragon, XAMPP, etc).

    DBngin (recomendado para gerenciar o serviço de banco de dados) ou outro servidor MySQL.

Passo a Passo

    Clonar o Repositório na Pasta do Herd
    Para que o Laravel Herd detecte seu projeto e crie a URL .test automaticamente, você precisa clonar o repositório dentro da pasta que ele monitora (por padrão, ~/Herd).
    Bash

# Navegue até a pasta do Herd
    cd ~/Herd

# Clone o repositório
    git clone https://github.com/Baroli03/processo-seletivo-autogestor.git

# Entre na pasta do projeto
    cd processo-seletivo-autogestor

Nota: Se você configurou o Herd para monitorar uma pasta diferente, navegue até ela.

Instalar Dependências
Instale as dependências do PHP com o Composer. O arquivo .env será criado automaticamente nesta etapa.
Bash

    composer install

Gerar a Chave da Aplicação
Este passo é crucial para a segurança da sua aplicação.
Bash

    php artisan key:generate

Configurar o Banco de Dados
a. Abra o DBngin (ou seu gerenciador de banco de dados) e inicie o serviço do MySQL.
b. Crie um novo banco de dados. Nomeie-o, por exemplo, autogestor_db.
c. Abra o arquivo .env e atualize as variáveis do banco de dados:
Snippet de código

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=autogestor_db
    DB_USERNAME=root
    DB_PASSWORD=SUA_SENHA_ROOT_AQUI

Executar as Migrações e Popular o Banco
Este único comando irá criar todas as tabelas e já populará o banco com os dados iniciais necessários para teste (usuários, produtos, etc.), pois os Seeders já estão configurados para rodar junto com as migrações.
Bash

    php artisan migrate --seed

Compilar os Assets de Front-end
Instale as dependências de front-end e compile os arquivos CSS e JS.
Bash

    npm install
    npm run build

ධ Executando a Aplicação

Se você seguiu o Passo 1 e está usando Laravel Herd, o projeto já estará disponível automaticamente em uma URL como http://processo-seletivo-autogestor.test. Basta acessar pelo seu navegador.

Alternativamente, você pode usar o servidor de desenvolvimento integrado do Artisan:
Bash

    php artisan serve

E acessar a aplicação em http://127.0.0.1:8000.

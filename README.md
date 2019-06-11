SISTEMA DE TAREFAS

(Projeto base - Yii @)

ESTRUTURA DE DIRETÓRIOS
-------------------

      assets/             contém definições do assets
      commands/           contém comandos do console (controllers)
      components/         contém component class (Util)
      config/             contém configurações da aplicação
      controllers/        contém controllers
      mail/               contém arquivos de visualização para e-mails
      migrations/         contém migrations
      models/             contém model classes
      runtime/            contém arquivos gerados durante execução
      tests/              contém testes
      vendor/             contém pacotes de dependências
      views/              contém arquivos de visualização
      web/                contém scripts e web sources


REQUISITOS
------------

O requisito mínimo para este modelo de projeto: servidor Web que suporte PHP 5.4.0.

INSTALAÇÃO
------------

Instalando [Composer](http://getcomposer.org/)

Siga as instruções em [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

OU: No linux:
```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
OU Windows:
Download [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)

Após instalar composer, na raiz do projeto execute:

~~~
composer install
~~~

Configure o banco de dados em config/db.php

Execute as migrations para criar as tabelas no banco de dados. (Crie o banco de dados, caso ainda não exista)
~~~
php yii migrate
~~~

Execute o servidor para testar a aplicação

~~~
php yii serve
~~~

INFORMAÇÕES EXTRAS
------------

# Caso seja linux #

Ao clonar o projeto,

```
chmod -R 777 tarefas
```

```
git config core.fileMode false
```

```
chmod -R 777 tarefas
```

ps: faz com que ao alterar apenas as permissões do arquivo, o git não reconheça como uma alteração.
# 💈 Sistema de Agendamento para Barbearias

Aplicação web desenvolvida em **Laravel 10** para gerenciamento de **agendamentos de barbearia**, permitindo o controle de clientes, barbeiros, serviços e horários de atendimento.  
O sistema possui painel administrativo e interface moderna construída com **Tailwind CSS** e **Vite**.
Esta aplicação é parte do Projeto Integrador II do curso de Engenharia da Computação - Univesp.

---

## 🚀 Tecnologias Utilizadas

| Tecnologia | Versão | Função |
|-------------|---------|--------|
| **Laravel** | 10.49.1 | Framework backend PHP |
| **PHP** | 8.1.2 | Linguagem de programação |
| **Vite** | 5.4.21 | Empacotador de módulos front-end |
| **Tailwind CSS** | 4.0.0 | Estilização moderna e responsiva |
| **MySQL** | ≥ 8.0 | Banco de dados relacional |
| **Composer** | ≥ 2.x | Gerenciador de dependências PHP |
| **Node.js / NPM** | Node ≥ 18.x / NPM ≥ 9.x | Ambiente e gerenciador de pacotes para o front-end |

---

## 2. Instalar as dependências do Laravel
``` composer install ```

## 3. Criar o arquivo de ambiente
```cp .env.example .env```

## 4. Gerar a chave da aplicação
```php artisan key:generate```

## 5. Configurar o banco de dados
No arquivo .env, ajuste as credenciais conforme seu ambiente local:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Seu_banco_de_dados
DB_USERNAME=root
DB_PASSWORD=Senha_do_banco_de_dados
```
## 6. Rodar as migrations e seeders

```php artisan migrate --seed```

## 7. Instalar dependências do front-end
```npm install```

## 8. Compilar os assets
```npm run dev```

## 9. Iniciar o servidor local
```php artisan serve```

Acesse no navegador:
👉 http://localhost:8000


## 👥 Usuário Padrão (Seeder)

| Tipo          | Email            | Senha    |
| ------------- | ---------------- | -------- |
| Administrador | `admin@barbearia.com` | `123456` |


## 📆 Funcionalidades Principais

Cadastro e gerenciamento de clientes

Cadastro de barbeiros e serviços

Agendamento de horários por cliente e barbeiro

Filtro de agendamentos por data e barbeiro

Edição e cancelamento de agendamentos

Interface moderna e responsiva com Tailwind CSS

## 🧰 Comandos Úteis

| Comando                            | Descrição                                            |
| ---------------------------------- | ---------------------------------------------------- |
| `php artisan migrate:fresh --seed` | Recria o banco de dados com dados iniciais           |
| `php artisan serve`                | Inicia o servidor Laravel                            |
| `npm run dev`                      | Executa o build do front-end em modo desenvolvimento |

## 📸 Layout

O layout utiliza Tailwind CSS com personalização leve via Vite, garantindo:

Design limpo e moderno

Total responsividade


## 🧑‍💻 Autor

Maicon Cesário - [Linkedin](https://www.linkedin.com/in/maicon-cesario/)
# Sistema de gestão de alunos.
## Mini sistema com crud HTML + CSS + PHP + posgrees.

## O que é:
### Sistema de Controle de Alunos
É um programa feito em PHP feito para cuidar das informações dos alunos de um colégio. Ele foi criado para deixar mais fácil e organizado o jeito de cadastrar e acompanhar os estudantes, trazendo uma tela simples, arrumada e bem direta para os funcionários da escola e também para os alunos.
A plataforma deixa você fazer as tarefas principais do dia a dia, como cadastrar, ver a lista, mudar os dados e apagar os registros, usando o sistema de CRUD que funciona junto com um banco de dados PostgreSQL.

## Requisitos funcionais
ID	        Título	                     Descrição	                                                               Prioridade
RF01. Cadastro do aluno.	O sistema deve permitir o registo de novos alunos frequentar a escola/colégio.	          Média
RF02. Relatório dos alunos.	O sistema deve listar todos os alunos cadastrados na plataforma para a visualização.	  Média
RF03. Atualização do aluno. O sistema deve possuir a capacidade de alterar o estado : Ativo ou Inativo.            	  Média
RF04. Exclusão do aluno.	O sistema deve permitir apagar o registo de um aluno do banco de dados.	                  Média
RF05. Consultar do aluno.	O sistema deve listar o aluno com base no id mostrando as informações sobre ele.	      Média

---

### Objetivos :

### 1. Relatórios de alunos cadastrados.

#### Na tela
Aparece Uma lista com todos os alunos(menos os que foram deletados) mostrando dados como data e nascimento, email, nome, se está ativo e a turma aonde o aluno está.
#### No código
Ele começa chamando o arquivo que guarda todas as funções do sistema.
Depois, monta a estrutura básica da página na internet.
No topo e no final da página, ela puxa o cabeçalho e o rodapé para manter o visual padrão do site.
Bem no meio (no main), ele dá a ordem para rodar a função do relatório, que vai trazer os dados do banco e jogar na tela.

Com base na documentação simples que você escreveu para a página de **Relatório**, aqui está a documentação explicativa no mesmo formato simples ("Na tela" e "No código") para cada uma das outras páginas, analisando o que cada formulário exibe e como o seu código PHP executa a lógica.

---

### 2. Consulta de aluno específico

#### Na tela

Aparece um título indicando "Consulta aluno:" e um campo numérico onde o usuário digita o **ID** do aluno desejado. Há um botão "Consultar" para enviar a busca e um link direto para "Consulta DB". Após clicar em consultar, o resultado das informações do aluno buscado é exibido logo abaixo. No topo e no rodapé, aparecem a navegação do site e a área de anúncios.

#### No código

Ele começa chamando o arquivo com as funções do sistema.

Depois, constrói a estrutura da página incluindo o cabeçalho no topo.

No formulário, cria um campo do tipo número para receber o ID do aluno.

Quando o formulário é enviado (via requisição POST), o PHP inclui o arquivo de conexão com o banco de dados e chama a função `consultar()`, passando a conexão e o ID informado.

Por fim, insere um link de navegação para "select.php" e fecha a página com o rodapé padrão.

---

### 3. Cadastrar novo aluno

#### Na tela

Aparece um formulário com campos de texto e seleção para inserir os dados de um novo aluno: **Nome**, **Turma**, **E-mail**, **Data de Nascimento** e opção de seleção (rádio) para indicar se ele está **Ativo** (Sim ou Não). Também há um botão "Cadastrar" para salvar os dados e um botão "Limpar" para resetar os campos preenchidos.

#### No código

Começa chamando o arquivo de conexão com o banco de dados e o arquivo de funções gerais.

Em seguida, monta o HTML estruturado com o cabeçalho no topo e a área principal (`main`).

Dentro do `main`, define o formulário com os devidos campos de entrada (`input`).

Ao enviar o formulário (método POST), o código verifica a requisição e executa a função `cadastrar()`, enviando como parâmetros a conexão e os valores digitados (nome, turma, nascimento, status ativo e e-mail).

Finaliza carregando o rodapé padrão do site.

---

### 4. Excluir alunos

#### Na tela

Exibe um título "Página para apagar o usuário:" com um campo numérico para digitar o **ID** do aluno que será removido e o botão "Apagar". Também possui o link "Consulta DB" para verificar a lista do banco, além do menu de navegação no topo e a área de anúncios no rodapé.

#### No código

Primeiro, faz a inclusão do arquivo contendo as funções do sistema.

Desenvolve a estrutura básica HTML incluindo o cabeçalho padrão.

Cria o formulário contendo apenas a caixa de texto para o ID e o botão de submissão.

Quando o botão "Apagar" é acionado (via POST), conecta ao banco de dados e roda a função `apagar()`, informando a conexão e o ID que deve ser deletado.

Encerra a página com o link para visualização da lista e a inclusão do rodapé.

---

### 5. Atualizar cadastro aluno

#### Na tela

Exibe um formulário de alteração de cadastro. O primeiro campo obriga a digitação do **ID** do aluno que será atualizado. Logo abaixo, estão disponíveis os campos para redefinir as informações de **Nome**, **Turma**, **E-mail**, **Data de Nascimento** e o status de **Ativo** (Sim/Não). Há botões para confirmar as alterações ("Cadastrar"/Atualizar) e para resetar o formulário ("Limpar").

#### No código

Abre com a inclusão do arquivo de funções do sistema.

Desenvolve a estrutura de marcação da página, inserindo o cabeçalho padrão no topo.

Na seção principal (`main`), cria o formulário contendo a entrada obrigatória do ID do aluno junto aos demais campos de dados cadastrais.

Ao submeter o formulário (via POST), o PHP chama a função `atualizar()`, passando a conexão do banco de dados, o ID informante e todos os novos dados digitados para substituir os registros antigos.

Para concluir, inclui o rodapé visual na parte inferior da tela.

tabela 

```mermaid
erDiagram
alunos {
    int id pk "UNIQUE AUTO INCREMENT"
    string nome "NOT NULL"
    date nasc "NOT NULL"
    string turma "NOT NULL"
    string email "NOT NULL"
    bool ativo "NOT NULL"
}
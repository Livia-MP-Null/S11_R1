 <?php
    require_once __DIR__ . '/../database/conect.php';

    function cadastrar($conexao, $nome, $turma, $nasc, $ativo, $email)
    {
        $sql = "INSERT INTO alunos (nome, turma, nasc, ativo, email) VALUES
    (:nome, :turma, :nasc, :ativo, :email)";
        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":turma", $turma);
            $stmt->bindParam(":nasc", $nasc);
            $stmt->bindParam(":ativo", $ativo);
            $stmt->bindParam(":email", $email);

            $stmt->execute();
            echo "Aluno inserido com sucesso!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    function apagar($conexao, $id)
    {
        $sql = "DELETE FROM alunos WHERE id = :id";
        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            echo "Registro $id deletado.";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    function relatorio($conexao)
    {
        $sql = "SELECT * FROM alunos ORDER BY id";

        try {
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($alunos as $aluno) {
                echo "<hr>";
                echo "ID: {$aluno['id']}<br>";
                echo "Nome: {$aluno['nome']}<br>";
                echo "Nascimento: {$aluno['nasc']}<br>";
                echo "Turma: {$aluno['turma']}<br>";
                echo "E-mail: {$aluno['email']}<br>";
                echo "Ativo: {$aluno['ativo']}<br>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    function atualizar($conexao, $id, $nome, $turma, $nasc, $ativo, $email)
    {

        $sql = "UPDATE alunos SET nome = :nome , turma = :turma , nasc = :nasc , ativo = :ativo , email = :email WHERE id = :id";
        try {
            $stmt = $conexao->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":turma", $turma);
            $stmt->bindParam(":nasc", $nasc);
            $stmt->bindParam(":ativo", $ativo);
            $stmt->bindParam(":email", $email);

            $stmt->execute();
            echo "Aluno atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    function consultar_user($conexao, $id)
    {
        $sql = "SELECT nome, turma, email, nasc, ativo FROM alunos WHERE id =:id";
        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "nome: {$aluno['nome']}<br>";
            echo "turma: {$aluno['turma']}<br>";
            echo "nascimento: {$aluno['nasc']}<br>";
            echo "ativo: {$aluno['ativo']}<br>";
            echo "email: {$aluno['email']}<br><hr>";
        } catch (PDOException $e) {
            echo "erro: " . $e->getMessage();
        }
    }
    // Funções para login:
    function cadastrar_user($conexao, $email, $passWD)
{

    $sql = "INSERT INTO users (email,passwd ) VALUES (:email, :passWD";
    // Definimos a função que será enviada ao SQL
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":email", $email); // Aqui, definimos os valores que seram enviados para a table
        $stmt->bindParam(":passWD", $passWD);
        $stmt->execute();
        echo "Usuário cadastrado com sucesso! <br>";
        echo "<a href='../app/read.php'>Veja aqui</a>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function consulta_user($conexao, $email)
{
    try {
        $sql = "SELECT id, email, senha FROM usuarios WHERE email = :email;"; // Definimos a função que será enviada ao SQL
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":email", $email); // O ID  que será procurado é enviado à database
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario !== false) { // Se o Aluno não existir, o print dos dados são feitos
            return $usuario;
        } else {
            echo "Nenhum registro encontrado. Cadastre-se " . '<a href="./cadastrar.php">aqui</a>';
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    echo '<br>' . "<a href='./'>Retorne aqui</a>";
}

    ?>




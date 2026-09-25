CREATE TABLE alunos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    nasc DATE,
    turma TEXT,
    email TEXT,
    ativo BOOLEAN
)




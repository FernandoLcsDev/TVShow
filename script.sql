CREATE DATABASE tvshow;
use tvshow;

CREATE TABLE TB_PROGRAMA (
    COD_PROG INT PRIMARY KEY AUTO_INCREMENT,
    NOME_PROG VARCHAR(50),
    DIA_PROG TINYINT,
    HR_INICIO TIME,
    HR_FIM TIME
);

CREATE TABLE TB_ADMINISTRADOR (
    COD_ADM INT PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(100),
    LOGIN VARCHAR(50),
    SENHA VARCHAR(50)
);

CREATE TABLE POSSUI (
    FK_TB_PROGRAMA_COD_PROG INT,
    FK_TB_ADMINISTRADOR_COD_ADM INT
);
 
ALTER TABLE POSSUI ADD CONSTRAINT FK_POSSUI_1
    FOREIGN KEY (FK_TB_PROGRAMA_COD_PROG)
    REFERENCES TB_PROGRAMA (COD_PROG)
    ON DELETE SET NULL;
 
ALTER TABLE POSSUI ADD CONSTRAINT FK_POSSUI_2
    FOREIGN KEY (FK_TB_ADMINISTRADOR_COD_ADM)
    REFERENCES TB_ADMINISTRADOR (COD_ADM)
    ON DELETE SET NULL;

INSERT INTO TB_PROGRAMA(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
VALUES
("Hora Um","2","00:00","00:59"),
("Bom Dia Rio","2","01:00","01:59"),
("Bom Dia Brasil","2","02:00","02:59"),
("Encontro Com Patrícia Poeta","2","03:00","03:59"),
("Mais Você","2","04:00","04:59"),
("Globo Esporte","2","05:00","05:59"),
("Jornal Hoje","2","06:00","06:59"),
("O Cravo E A Rosa","2","07:00","07:59"),
("Sessão da Tarde","2","08:00","08:59"),
("Jornal da Globo","2","09:00","09:59"),
("Rock In Rio 2022","2","10:00","10:59"),
("Conversa com Bial","2","11:00","11:59"),
("Vale a Pena Ver de Novo","2","12:00","12:59"),
("Pantanal","2","13:00","13:59"),
("Globo Repórter","2","14:00","14:59"),
("Comédia Na Madruga I","2","15:00","15:59"),
("É de Casa","2","16:00","16:59"),
("Caldeirão Com Mion","2","17:00","17:59"),
("Altas Horas","2","18:00","18:59"),
("Cara e Coragem","2","19:00","19:59"),
("Santa Missa","2","20:00","20:59"),
("Globo Rural","2","21:00","21:59"),
("Temperatura Máxima","2","22:00","22:59"),
("Vai Que Cola","2","23:00","23:59");

INSERT INTO TB_PROGRAMA(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
VALUES
("Vai Que Cola","3","00:00","00:59"),
("Temperatura Máxima","3","01:00","01:59"),
("Globo Rural","3","02:00","02:59"),
("Santa Missa","3","03:00","03:59"),
("Mais Você","3","04:00","04:59"),
("Cara e Coragem","3","05:00","05:59"),
("É de Casa","3","06:00","06:59"),
("Comédia Na Madruga I","3","07:00","07:59"),
("Globo Repórter","3","08:00","08:59"),
("Hora Um","3","09:00","09:59"),
("Encontro Com Patrícia Poeta","3","10:00","10:59"),
("Conversa com Bial","3","11:00","11:59"),
("Vale a Pena Ver de Novo","3","12:00","12:59"),
("Pantanal","3","13:00","13:59"),
("Globo Repórter","3","14:00","14:59"),
("Mais Você","3","15:00","15:59"),
("Globo Esporte","3","16:00","16:59"),
("Caldeirão Com Mion","3","17:00","17:59"),
("Altas Horas","3","18:00","18:59"),
("O Cravo E A Rosa","3","19:00","19:59"),
("Sessão da Tarde","3","20:00","20:59"),
("Jornal da Globo","3","21:00","21:59"),
("O Cravo E A Rosa","3","22:00","22:59"),
("Rock In Rio 2022","3","23:00","23:59");

INSERT INTO TB_PROGRAMA(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
VALUES
("Jornal da Globo","4","00:00","00:59"),
("Sessão da Tarde","4","01:00","01:59"),
("O Cravo E A Rosa","4","02:00","02:59"),
("Santa Missa","4","03:00","03:59"),
("Rock In Rio 2022","4","04:00","04:59"),
("O Cravo E A Rosa","4","05:00","05:59"),
("Altas Horas","4","06:00","06:59"),
("Caldeirão Com Mion","4","07:00","07:59"),
("Globo Esporte","4","08:00","08:59"),
("Mais Você","4","09:00","09:59"),
("Globo Repórter","4","10:00","10:59"),
("Conversa com Bial","4","11:00","11:59"),
("Pantanal","4","12:00","12:59"),
("Vale a Pena Ver de Novo","4","13:00","13:59"),
("Conversa com Bial","4","14:00","14:59"),
("Hora Um","4","15:00","15:59"),
("Vai Que Cola","4","16:00","16:59"),
("Temperatura Máxima","4","17:00","17:59"),
("Santa Missa","4","18:00","18:59"),
("Mais Você","4","19:00","19:59"),
("Sessão da Tarde","4","20:00","20:59"),
("Cara e Coragem","4","21:00","21:59"),
("É de Casa","4","22:00","22:59"),
("Comédia Na Madruga I","4","23:00","23:59");

INSERT INTO TB_PROGRAMA(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
VALUES
("Jornal da Globo","5","00:00","00:59"),
("Sessão da Tarde","5","01:00","01:59"),
("Santa Missa","5","02:00","02:59"),
("Comédia Na Madruga I","5","03:00","03:59"),
("O Cravo E A Rosa","5","04:00","04:59"),
("Rock In Rio 2022","5","05:00","05:59"),
("É de Casa","5","06:00","06:59"),
("Sessão da Tarde","5","07:00","07:59"),
("Mais Você","5","08:00","08:59"),
("Temperatura Máxima","5","09:00","09:59"),
("Vai Que Cola","5","10:00","10:59"),
("Conversa com Bial","5","11:00","11:59"),
("Hora Um","5","12:00","12:59"),
("TV Globinho","5","13:00","13:59"),
("Horário Político 2022","5","14:00","14:59"),
("Que História É Essa Porchat?","5","15:00","15:59"),
("Reapresentação Novela II - Cara E Coragem","5","16:00","16:59"),
("1 Maior - Dia Sem Fim","5","17:00","17:59"),
("Domingão Com Huck","5","18:00","18:59"),
("Pipoca Da Ivete","5","19:00","19:59"),
("Fantástico","5","20:00","20:59"),
("Corujão I - Sr. Sherlock Holmes","5","21:00","21:59"),
("Cine Holliúdy","5","22:00","22:59"),
("Profissão Repórter","5","23:00","23:59");

INSERT INTO TB_PROGRAMA(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
VALUES
("Balanço Geral Manhã","6","00:00","00:59"),
("Fala Brasil","6","01:00","01:59"),
("Hoje em Dia","6","02:00","02:59"),
("Cidade Alerta","6","03:00","03:59"),
("Chaves","6","04:00","04:59"),
("Amor Sem Igual","6","05:00","05:59"),
("Fala Que Eu Te Escuto","6","06:00","06:59"),
("Chamas da Vida","6","07:00","07:59"),
("Ilha Record 2","6","08:00","08:59"),
("Jornal da Record - 24h","6","09:00","09:59"),
("Operação Mesquita","6","10:00","10:59"),
("The Noite com Danilo Gentili","6","11:00","11:59"),
("Programa do Ratinho","6","12:00","12:59"),
("TV Globinho","6","13:00","13:59"),
("SBT Brasil","6","14:00","14:59"),
("Supernatural","6","15:00","15:59"),
("Programa Silvio Santos","6","16:00","16:59"),
("1 Maior - Dia Sem Fim","6","17:00","17:59"),
("Conexão Repórter","6","18:00","18:59"),
("Carrossel","6","19:00","19:59"),
("Poliana Moça","6","20:00","20:59"),
("Cuidado Com O Anjo","6","21:00","21:59"),
("Esmeralda","6","22:00","22:59"),
("TV Globinho","6","23:00","23:59");

INSERT INTO TB_PROGRAMA(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
VALUES
("Primeiro Impacto","7","00:00","00:59"),
("Os Pequenos Johnstons","7","01:00","01:59"),
("TV Globinho","7","02:00","02:59"),
("Esmeralda","7","03:00","03:59"),
("Cuidado Com O Anjo","7","04:00","04:59"),
("Poliana Moça","7","05:00","05:59"),
("Carrossel","7","06:00","06:59"),
("Conexão Repórter","7","07:00","07:59"),
("Horário Eleitoral Gratuito","7","08:00","08:59"),
("Fofocalizando","7","09:00","09:59"),
("A Desalmada","7","10:00","10:59"),
("Cúmplices de um Resgate","7","11:00","11:59"),
("Supernatural","7","12:00","12:59"),
("Bolsa Família","7","13:00","13:59"),
("Poliana Moça","7","14:00","14:59"),
("Hoje em Dia","7","15:00","15:59"),
("Cidade Alerta","7","16:00","16:59"),
("Chaves","7","17:00","17:59"),
("Amor Sem Igual","7","18:00","18:59"),
("Fala Que Eu Te Escuto","7","19:00","19:59"),
("Chamas da Vida","7","20:00","20:59"),
("Ilha Record 2","7","21:00","21:59"),
("The Noite com Danilo Gentili","7","22:00","22:59"),
("Ilha Record 2","7","23:00","23:59");

INSERT INTO TB_PROGRAMA(NOME_PROG,DIA_PROG,HR_INICIO,HR_FIM)
VALUES
("TV Fama","1","00:00","00:59"),
("Operação de Risco Reprise","1","01:00","01:59"),
("Extreme Fighting","1","02:00","02:59"),
("Leitura Dinâmica","1","03:00","03:59"),
("Pgm Ultrafarma","1","04:00","04:59"),
("Empreendedorismo na Rede","1","05:00","05:59"),
("Show da Saúde","1","06:00","06:59"),
("Free Fire na Rede TV","1","07:00","07:59"),
("POLISHOP","1","08:00","08:59"),
("Programa Amaury Jr","1","09:00","09:59"),
("Igreja Bola de Neve","1","10:00","10:59"),
("Ilha Record 2","1","11:00","11:59"),
("Fala Que Eu Te Escuto","1","12:00","12:59"),
("The Noite com Danilo Gentili","1","13:00","13:59"),
("Poliana Moça","1","14:00","14:59"),
("Hoje em Dia","1","15:00","15:59"),
("Conexão Repórter","1","16:00","16:59"),
("A Desalmada","1","17:00","17:59"),
("Bolsa Família","1","18:00","18:59"),
("Fala Que Eu Te Escuto","1","19:00","19:59"),
("Fofocalizando","1","20:00","20:59"),
("Ilha Record 2","1","21:00","21:59"),
("Chamas da Vida","1","22:00","22:59"),
("Cidade Alerta","1","23:00","23:59");

INSERT INTO TB_ADMINISTRADOR (NOME,LOGIN,SENHA)
VALUES
("admin","admin", "admin");
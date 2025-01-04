# CAAgua
Estrutura do banco de dados

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `datanasc` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `status` char(1) NOT NULL,
  `admin` char(1) NOT NULL
)

3, 'Teste', '65516561616', '1998-05-24', 'teste@gmail.com', '56456156174', 'Colocar umsa senha', 's', 'n's),

CREATE TABLE `fatura` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  `status` char(1) NOT NULL,
  `vencimento` date NOT NULL,
  `idleitura` int(11) NOT NULL
)

CREATE TABLE `leitura` (
  `id` int(11) NOT NULL,
  `dataleitura` date NOT NULL,
  `leituraanterior` decimal(6,1) NOT NULL,
  `leituraatual` decimal(6,1) NOT NULL,
  `idmedidor` int(11) NOT NULL
)
CREATE TABLE `medidor` (
  `id` int(11) NOT NULL,
  `numserie` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `datainicio` date NOT NULL,
  `dataprevistatroca` date NOT NULL,
  `idusuario` int(11) NOT NULL
)

DELIMITER $$
CREATE TRIGGER `insere_fatura` AFTER INSERT ON `leitura` FOR EACH ROW BEGIN
    DECLARE consumo Float;
 		DECLARE valor_fatura DECIMAL(10, 2);
    SET consumo = NEW.leituraatual - NEW.leituraanterior;
    
    IF consumo <= 45 THEN
        SET valor_fatura = consumo * 1.50;
    ELSEIF consumo <= 75 THEN
        SET valor_fatura = 45 * 1.50 + (consumo - 45) * 5.00;
    ELSE
        SET valor_fatura = 45 * 1.50 + 30 * 5.00 + (consumo - 75) * 10.00;
    END IF;
    
    INSERT INTO fatura (data, valor, status, vencimento, idleitura)
    VALUES (NEW.dataleitura, valor_fatura, 'n', DATE_ADD(NEW.dataleitura, INTERVAL 7 DAY), NEW.id);
END
$$
DELIMITER ;


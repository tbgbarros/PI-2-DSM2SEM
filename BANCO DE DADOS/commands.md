 DELIMITER $$
CREATE TRIGGER registrar_mov_medico 
BEFORE INSERT OR UPDATE OR DELETE ON medico
FOR EACH ROW
BEGIN
    INSERT INTO log (usuario, data_login)
    VALUES (NEW.usuario, NEW.data_login);
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER registrar_timestamp_medico AFTER INSERT ON medico
FOR EACH ROW
BEGIN
  INSERT INTO log (usuario, data_login)
  VALUES (NEW.crm, CURRENT_TIMESTAMP);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE buscar_ultimas_consultas()
BEGIN
  SELECT c.dt_consulta, m.ID_medico, m.nomemedico, p.nome, p.cpf, p.observacoes
  FROM consulta AS c
  JOIN medico AS m ON c.ID_medico = m.ID_medico
  JOIN pacientes AS p ON c.ID_paciente = p.ID_paciente
  ORDER BY c.dt_consulta DESC
  LIMIT 10; -- Limite de 10 consultas, você pode ajustar conforme necessário
END$$
DELIMITER ;

CREATE TABLE comerciantes (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(20) DEFAULT NULL,
    email varchar(50) DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE vendas (
    id int(11) NOT NULL AUTO_INCREMENT,
    comerciante_id int(11) DEFAULT NULL,
    comissao int(11) DEFAULT NULL,
    valor_da_venda decimal(10,2) DEFAULT NULL,
    data_da_venda date DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `comerciante_id_venda` FOREIGN KEY (`comerciante_id`) REFERENCES `comerciantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

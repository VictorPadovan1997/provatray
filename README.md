
# Prova Prática para Programador PHP
### Aplicação:

Desenvolver um sistema para cadastro de vendas para vendedores e calcular a
comissão dessas vendas (a comissão será de 8.5% sobre o valor da venda)

### Funcionalidades:

- [x] CRUD de vendedores (id, nome, email);

- [x] Inserir nova venda (id do vendedor, valor da venda);

- [x] Listar todas as vendas

- [x] Ao final de cada dia deve ser enviado um email com um relatório com a soma de
todas as vendas efetuadas no dia.


# Documentação

### 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [XAMPP](https://sourceforge.net/projects/xampp/files/XAMPP%20Mac%20OS%20X/5.6.40/)
- [PHP V.5](https://nodejs.org/en/)

- Para teste será necessario criar as tabelas no banco de dados MYSQL foi utilizado em ambiente de teste XAMPP.
```
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
```

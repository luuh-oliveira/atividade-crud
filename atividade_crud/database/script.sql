#CRIAÇÃO DA TABELA DE USUÁRIO PARA LOGIN 

create table tbl_usuario(
    id int primary key auto_increment,
    usuario varchar(255) not null,
    senha varchar (255) not null
    );
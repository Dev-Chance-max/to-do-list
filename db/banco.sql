create database todo_list;
use todo_list;

create table tasks(
	id INT auto_increment primary key,
    task varchar(255) not null,
    status enum ('pendente','concluido') default 'pendente'
);

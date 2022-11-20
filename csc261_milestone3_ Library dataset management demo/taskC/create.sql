create table book
(book_ID int,
book_name varchar(70),
author varchar(30),
type_g varchar(40),
pub_year int,
langua varchar(30),
primary key (book_ID));

create table library
(library_ID int, 
library_name varchar(40), 
address varchar(50),
zipcode char(5),
primary key (library_ID));

create table borrower
(borrower_name varchar(30), 
ssn char(9), 
birthday DATE, 
email varchar(30), 
phone char(10),
primary key (ssn));

create table copies
(book_ID int, 
copy_ID int, 
library_ID int, 
price int, 
late_return_fine decimal(4,2),
primary key (book_ID, copy_ID),
foreign key (book_ID) references book(book_ID) on delete cascade on update cascade,
foreign key (library_ID) references library(library_ID) on delete cascade on update cascade);

create table loanrecord
(record_ID int ,
book_ID int, 
copy_ID int, 
library_ID int, 
ssn char(9), 
borrowed_date DATE, 
due_date DATE, 
return_date DATE,
primary key (record_ID),
foreign key (book_ID, copy_ID) references copies(book_ID, copy_ID) on delete set null,
foreign key (ssn) references borrower(ssn) on delete set null,
foreign key (library_ID) references library(library_ID) on delete set null);

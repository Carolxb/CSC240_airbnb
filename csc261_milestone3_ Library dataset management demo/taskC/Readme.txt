The database name is 'xlou5_1' in mysql.
There are 5 csv files for table book, borrower, copies, library, and loanrecord. In these 5 files, there is just dummy data that I input to create tables for taskC. 
For the book table, we refers to some real book name and authors online from https://github.com/konflic/examples/blob/master/data/books.csv but create other columns like publish year, book_ID, and genre by ourselves. 

For the library table, we refers to some real library name in University of Rochester and some real address in Rochester. But there're also some library name and zipcode information arranged by ourselves.
For the other csv files, there is just dummy data created by ourselves.
For the most part, we just made up the data so if there are any information there that are real, that was just coincidental. 

The create.sql has a bunch of create table code for setting and constraint the form of a table.
The load.sql has a bunch of calls that I used to load the data into my database from beta web.

When I create the dataset to beta web, I use the code below in terminal:
ssh xlou5@betaweb.csug.rochester.edu
password:ZAZrmATB
ls
cd taskC
mysql -u xlou5 -p xlou5_1
password:ZAZrmATB
source ../taskC/create.sql
source ../taskC/load.sql
show tables;
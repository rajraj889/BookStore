create table customer(
cid int not null AUTO_INCREMENT,
email varchar(20) not null,
name varchar(10) not null,
pswd varchar(10) not null,
contact varchar(10) not null,
primary key (cid),
unique (email),
unique (contact)
);

create table wishlist(
wid int not null AUTO_INCREMENT,
cid int not null,
book_name varchar(20) not null,
author varchar(15) not null,
publication varchar(20),
primary key(wid),
foreign key(cid) references customer(cid)
);

create table book(
bid int not null AUTO_INCREMENT,
oid int not null,
title varchar(20) not null,
author varchar(15) not null,
isbn varchar(13) not null,
publication varchar(20),
edition varchar(15),
avail varchar(1),
mode varchar(1),
aprice int not null,
oprice int not null,
primary key (bid),
foreign key(oid) references customer (cid)
);

create table po(
poid int not null AUTO_INCREMENT,
bid int not null,
buyid int not null,
odate date not null,
primary key (poid),
foreign key (bid) references book(bid),
foreign key(buyid) references customer(cid)
);


create table ro(
roid int not null AUTO_INCREMENT,
bid int not null,
buyid int not null,
idate date not null,
ddate date ,
rdate date ,
fine int ,
primary key (roid),
foreign key (bid) references book(bid),
foreign key(buyid) references customer(cid)
);


create table address(
cid int not null AUTO_INCREMENT,
ad1 varchar(20),
ad2 varchar(15),
city varchar(10),
pin varchar(6),
foreign key(cid) references customer (cid),
primary key(cid)
);


insert into customer values(1,'sameer@gmail.com', 'Sameer', 'Sameer', 9955518876);
insert into customer values(2,'soumya@gmail.com', 'Soumya', 'Soumya', 9555598898);
insert into customer values(3,'bhavika@gmail.com', 'Bhavika', 'Bhavika', 7555698753);
insert into customer values(4,'raj@gmail.com', 'Raj', 'Raj', 7555575170);
insert into customer values(5,'rucha@gmail.com', 'Rucha', 'Rucha', 8555535051);
insert into customer values(6,'hrushabh@gmail.com', 'Hrushabh', 'Hrushabh', 9955593515);
insert into customer values(7,'dheeraj@gmail.com', 'Dheeraj', 'Dheeraj', 9955564504);
insert into customer values(8,'yash@gmail.com', 'Yash', 'Yash', 7555848150);
insert into customer values(9,'siddhesh@gmail.com', 'Siddhesh', 'Siddhesh', 7555556694);
insert into customer values(10,'jyotsna@gmail.com', 'Jyotsna', 'Jyotsna', 9855532846);

insert into book(bid, oid, title, author, isbn, publication, edition, avail, mode, aprice, oprice) values(1,9,'Angels And Demons', 'Dan Brown', 9780552150736, 'Corgi Books', 'Reprint, 2003', 'y', 'p', 349, 140);

insert into book(bid, oid, title, author, isbn, publication, avail, mode, aprice, oprice) values(2,2,'Only Time Will Tell', 'Jeffrey Archer', 9780330517980, 'Pan Publishing', 'y', 'r', 199, 160);

insert into book(bid, oid, title, author, isbn, publication, edition, avail, mode, aprice, oprice) values(3,10,'Gone Girl', 'Gillian Flynn', 9780753827666, 'Phoenix', '2013', 'y', 'p', 399, 168);

insert into book(bid, oid, title, author, isbn, publication, avail, mode, aprice, oprice) values(4,3,'The Kite Runner', 'Khaled Hosseini', 9780747566533, 'Bloomsbury', 'y', 'p', 350, 201);

insert into book(bid, oid, title, author, isbn, publication, edition, avail, mode, aprice, oprice) values(5, 6, 'Definitely Dead', 'Charlaine', 9780575091047, 'Gollancz Fiction', '2005', 'y', 'r', 399, 131);

insert into book(bid, oid, title, author, isbn, publication, edition, avail, mode, aprice, oprice) values(6,9, 'Lights of Liverpool',  'Ruth Hamilton', 9780330522250, 'Pan Macmillan', 'Main Market Ed.', 'n', 'r', 491, 102);

insert into book(bid, oid, title, author, isbn, publication, edition, avail, mode, aprice, oprice) values(7,4,'Fall of Giants', 'Ken Follett', 9780330460552, 'Macmillan', 'Main Market Ed.', 'y', 'p', 499, 202);

insert into book(bid, oid, title, author, isbn, publication, avail, mode, aprice, oprice) values(8,1,'Coolie', 'Mulk Raj Anand', 9780140186802, 'Penguin Classics', 'y', 'p', 299, 254);

insert into book(bid, oid, title, author, isbn, publication, edition, avail, mode, aprice, oprice) values(9,8,'MBA at 16', 'Subroto Bagchi', 9780143330974, 'Penguin Books', '2012', 'n', 'r', 199, 169);

insert into book(bid, oid, title, author, isbn, avail, mode, aprice, oprice) values(10,3,'Ask Again, Yes', 'Mary Beth Keane', 9781982130084, 'y', 'p', 599, 509);

insert into wishlist(wid, cid, book_name, author, publication) values(1, 2, 'Digital Fortress', 'Dan Brown', 'Corgi books');

insert into wishlist(wid, cid, book_name, author, publication) values(2, 7, 'Gone Girl', 'Gillian Flynn', 'Phoenix');

insert into wishlist(wid, cid, book_name, author, publication) values(3, 2, 'Northern Lights', 'Philip Pullman', 'Scholastic');

insert into wishlist(wid, cid, book_name, author, publication) values(4, 3, 'Shiver', 'Maggie S', 'Scholastic');

insert into wishlist(wid, cid, book_name, author, publication) values(5, 4, 'Catching Fire', 'Suzanne Collins', 'Scholastic');

insert into wishlist(wid, cid, book_name, author, publication) values(6, 6, 'Forever', 'Maggie S', 'Scholastic');

insert into wishlist(wid, cid, book_name, author, publication) values(7, 4, 'The Kite Runner', 'Khaled Hosseini', 'Bloomsbury');

insert into wishlist(wid, cid, book_name, author, publication) values(8, 5, 'Deception Point', 'Dan Brown', 'Corgi books');

insert into wishlist(wid, cid, book_name, author, publication) values(9, 10, 'Digital Fortress', 'Dan Brown', 'Corgi books');

insert into wishlist(wid, cid, book_name, author, publication) values(10, 1, 'Gone Girl', 'Gillian Flynn', 'Phoenix');

insert into address values(1,' 214, Meenakshi Cplx', ' Begur Main Rd', 'Kurla', 400002);
insert into address values(2,' 56 Sutarr Apt', ' Dvg Road', 'Dombivli', 400044);
insert into address values(3,'  33, Gangappa Cplx', 'Gandhi Bazar', 'Kurla', 400002);
insert into address values(4,' 82/84 Dontad Street', ' Chinch Bunder', 'Bhayander', 400054);
insert into address values(5,'  Plot No 117', '  Penkar Pada', 'Mulund', 400037);
insert into address values(6,' 1/8, 5 Gauri Ashish', ' Nanabhai Marg,', 'Kharghar', 400010);
insert into address values(7,' 2, Sudama House', ' Station Road', 'Panvel', 400048);
insert into address values(8,'  6, Jay Apt', ' Nehru Road', 'Kharghar', 400010);
insert into address values(9,'  2, Rameshghar', 'T.kataria Marg', 'Kalyan', 400069);
insert into address values(10,'  2 Jerome Villa', ' Azad Road', 'Thane', 400024);

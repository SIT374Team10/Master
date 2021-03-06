drop table users;

create table users
(USERNAME NVARCHAR2(20) NOT NULL,
SUBMIT NVARCHAR2(64) NOT NULL,
EMAIL NVARCHAR2(20) NOT NULL,
PRIMARY KEY (USERNAME));

insert into users values('Demi', 'Brauer', 'demi@html.com');
insert into users values('Cameron', 'Macfarlane', 'cameron@html.com');
insert into users values('craig', 'p0werp01nt', 'craig@html.com');

COMMIT;

drop table infrastructure;
drop SEQUENCE SEQUENCE_ID;

CREATE SEQUENCE SEQUENCE_ID START WITH 1 INCREMENT BY 1;

create table infrastructure
(ID NUMBER (20) NOT NULL,
COST NVARCHAR2(20),
USERNAME NVARCHAR2(20) NOT NULL,
SERVICE NVARCHAR2(20) NOT NULL,
RAM NVARCHAR2(20) NOT NULL,
SSD NVARCHAR2(20) NOT NULL,
PACKAGEONE NVARCHAR2(20),
PACKAGETWO NVARCHAR2(20),
PACKAGETHREE NVARCHAR2(20),
PACKAGEFOUR NVARCHAR2(20),
PACKAGEFIVE NVARCHAR2(20),
PACKAGESIX NVARCHAR2(20),
PACKAGESEVEN NVARCHAR2(20),
PACKAGEEIGHT NVARCHAR2(20),
PACKAGENINE NVARCHAR2(20),
PACKAGETEN NVARCHAR2(20),
PACKAGEELEVEN NVARCHAR2(20),
PACKAGETWELVE NVARCHAR2(20),
PACKAGETHIRTEEN NVARCHAR2(20),
PACKAGEFOURTEEN NVARCHAR2(20),
PACKAGEFIFTEEN NVARCHAR2(20),
PACKAGESIXTEEN NVARCHAR2(20),
PACKAGESEVENTEEN NVARCHAR2(20),
PACKAGEEIGHTTEEN NVARCHAR2(20),
PACKAGENINETEEN NVARCHAR2(20),
PACKAGETWENTY NVARCHAR2(20),
PACKAGETWENTYONE NVARCHAR2(20),
SERVERS NVARCHAR2(20) NOT NULL,
VM NVARCHAR2(20) NOT NULL,
CPU NVARCHAR2(20) NOT NULL,
PRIMARY KEY (ID));

insert into infrastructure values(SEQUENCE_ID.nextval,'30.0', '1', '2', '3', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '23', '24');

COMMIT;

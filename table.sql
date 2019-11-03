mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use sampledb;

select * from registryuser;
drop table registryuser;
create table registryuser (username varchar(20) primary key);
insert into registryuser values('user1-0001');
insert into registryuser values('user2-1002');
insert into registryuser values('user3-0503');
insert into registryuser values('user4-0074');
insert into registryuser values('user5-0325');
select * from registryuser;

drop table winner;
create table winner (username varchar(20) primary key,round varchar(20));
insert into winner values('user3-0503','special prize');
delete from winner;

select username from registryuser where username not in (select username from winner);

//drop table TEMPLUCKYDRAW;
//create table TEMPLUCKYDRAW (sn int,username varchar(20) primary key);

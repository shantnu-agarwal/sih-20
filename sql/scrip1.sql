create table crops(
    name varchar(30) PRIMARY KEY,
    season INT,
	descript varchar(20),
    price INT,
    rainfall INT,
    mature_time INT,
    img_url varchar(200) DEFAULT "#!"
);

alter table crops add column comments varchar(400);


-- cast(select price from crops,string);

select cost_price from crops where id='10';
select * from crops where 

SELECT * from dataofcrops WHERE State_Name='Uttar Pradesh' AND  District_Name='Agra' AND  Season='Kharif';

select * from crops;

create table users(
user_id int primary key auto_increment,
fname varchar(50),
lname varchar(50),
phone_no varchar(10),
aadhaar_no varchar(12),
pswd varchar(50)
);

select * from users;

-- alter table users modify column aadhaar rename aadhaar;

alter table crops MODIFY COLUMN descript varchar(400);

ALTER TABLE users RENAME COLUMN aadhaar_no TO aadhaar;

ALTER TABLE crops RENAME COLUMN mature_time TO ttm;

insert into users values("27","shantnu","agarwal","9711200282","123456789012","astroller27");
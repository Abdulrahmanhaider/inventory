
CREATE TABLE IF NOT EXISTS `item_mstr`(`id`varchar(100) primary key,`item_name`varchar(100),`item_code`varchar(50),`price` int not null,`datetime`datetime NOT NULL DEFAULT current_timestamp(),`status` int (1) default 1);

CREATE TABLE IF NOT EXISTS `supplier_mstr`(`id`varchar (100) primary key,`supplier_name`varchar(100),`mobile_no`bigint,`address`varchar(100),`datetime`datetime NOT NULL DEFAULT current_timestamp(),`status` int (1) default 1 Not null);

CREATE TABLE IF NOT EXISTS `purchase_mstr`(`id`varchar(100) primary key,`invoice_no`varchar(100),`invoice_date` date,`supplier_id`varchar(100), foreign key(supplier_id)references supplier_mstr(id) on update cascade on delete cascade ,`total_amount`int NOT null,`datetime` datetime NOT NULL DEFAULT current_timestamp(),`status`int(1)default 1 );

CREATE TABLE IF NOT EXISTS `puchase_details`
(`id`int PRIMARY key,
`item_id`varchar(100),
FOREIGN KEY (`item_id`) REFERENCES `item_mstr` (`id`)ON UPDATE CASCADE ON DELETE CASCADE ,
`purchase_master_id`varchar(100) , foreign key (purchase_master_id)references purchase_mstr(id)ON UPDATE CASCADE ON DELETE CASCADE ,
 `quantity`int not null,
 `price`int not null,
 `amount` int not null,
 
 `datetime`datetime NOT NULL DEFAULT current_timestamp(),`status`int(1)default 1);




CREATE TABLE IF NOT EXISTS `sale_mstr` (`id`varchar(100) PRIMARY KEY,`customer_name`varchar(50),`mob_number`bigint,`bill_no`varchar(50),`invoice_date` date ,`totalamount`int,`datetime`datetime NOT NULL DEFAULT current_timestamp() ,`status` int(1)default 1);


CREATE TABLE IF NOT EXISTS `sale_details` (
    `id`varchar(100) PRIMARY KEY,
    `item_id`varchar(100),FOREIGN KEY(item_id) REFERENCES item_mstr(id) ON UPDATE CASCADE ON DELETE CASCADE,
    `quantity`int ,
    `price` int,
     `amount`int,
     `sale_mstr_id`varchar(100),foreign key(sale_mstr_id) REFERENCES sale_mstr(id) ON UPDATE CASCADE ON DELETE CASCADE,
     `datetime`datetime NOT NULL DEFAULT current_timestamp(),
     `status` int(1) default 1
    );
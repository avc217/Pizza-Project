create database avc_thepizzapalor;

use C251019_avc_thepizzapalor;


create table	admin_user
				(adminID			integer		not null auto_increment,
				 FirstName	    char(25)	not null,
				 LastName		char(25)	not null,
				 Email		    char(25)	not null,
                 Username       char(25)    not null,
				 Admin_Password	char(25)	not null,
                 AdminLevel    int(2)       not NULL,
				 primary key(adminID));


create table	users
				(UserID		integer		not null auto_increment,
				 FirstName		char(25)	not null,
				 LastName		char(25)	not null,
				 Street			char(40)	not null,
				 Apt			char(10)		null,
				 City			char(40)	not	null,
				 State			char(40)	not null,
				 Zipcode		char(10)	not null,
				 Email			char(40)	not null,
				 Phone			char(14)	not null,
				 primary key(UserID));


create table	pizza_order_information
				(PizzaID			integer			not null auto_increment,
                 customerID			integer			not null,
				 OrderDescri		text(1000)		not null,
				 OrderSubTotal		double(16,2)	not null,
				 OrderTax			double(16,2)	not null,
				 OrderTotal			double(16,2)	not null,
				 OrderDate			char(22)		not null,
				 OrderComplete		VARCHAR(1) 		NOT NULL 	DEFAULT 'N',
				 primary key(PizzaID));
 
			
 



CREATE DATABASE francoreynoso;
USE francoreynoso;

CREATE TABLE to_do (
  id int AUTO_INCREMENT NOT NULL,
  name varchar(90) NOT NULL,
  created_at date,
  completed_at date,
  status int,
  active int,
  PRIMARY KEY (id)
);


INSERT INTO to_do (name, created_at, completed_at, status, active)
                VALUES	("Wash Dishes", "2021-09-05", curdate(), 1 , 1),
						("Pick Kids from School", "2021-09-05", curdate(), 1,  1),
                        ("Clean bedroom", "2021-09-06", curdate(), 1, 1 ),
                        ("Study", "2021-09-07", curdate(), 1, 1 ),
                        ("Pay Rent", "2021-09-01", curdate(), 1, 1 ),
                        ("Call Mom", "2021-09-00", curdate(), 1, 1 ),
                        ("Take Dog To The Vet", "2021-08-10", "2021-09-01" , 1,1 ),
						("Wash Car", "2021-08-22", "2021-09-01" , 1,1 ),
                        ("Go for a Walk", "2021-09-00", "2021-09-01" , 1,1 ),
                        ("Wash Dishes", "2021-09-02", "2021-09-08" , 1 ,1),
                        ("Paint Bedroom", "2021-09-02", "2021-09-07" , 1 ,1);
                        
INSERT INTO to_do (name, created_at, status, active)
                VALUES	("Dog Bath", "2021-09-05", 0,1 ),
                        ("Pay School", "2021-09-05", 0,1 ),
                        ("Call Dad", "2021-09-06", 0 ,1),
                        ("Call Aunt", "2021-09-01", 0 ,1),
                        ("Cut Hair", "2021-09-02", 0 ,1),
                        ("Wash car", "2021-09-04",0 ,1),
                        ("Pay Rent", "2021-09-02", 0 ,1),
                        ("Go for a Walk", "2021-09-05", 0 ,0),
                        ("Go for a Walk", "2021-09-00", 0 ,0),
                        ("Go for a Walk", "2021-08-15", 0 ,0),
                        ("Go for a Walk", "2021-08-11", 0 ,0),
                        ("Go for a Walk", "2021-08-06", 0 ,0),
                        ("Go for a Walk", "2021-08-03", 0 ,0),
                        ("Go for a Walk", "2021-09-06", 0 ,0),
                        ("Call Dad", "2021-09-02",0 ,1);
                        


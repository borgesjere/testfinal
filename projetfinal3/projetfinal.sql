------------------------------------------------------------
--        Script Postgre 
------------------------------------------------------------



------------------------------------------------------------
-- Table: chapter
------------------------------------------------------------
CREATE TABLE public.chapter(
	id              SERIAL NOT NULL ,
	title           VARCHAR (100) NOT NULL ,
	content         VARCHAR (2000)  NOT NULL ,
	creation_date   DATE  NOT NULL ,
	mumber          INT  NOT NULL  ,
	CONSTRAINT chapter_PK PRIMARY KEY (id)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: level
------------------------------------------------------------
CREATE TABLE public.level(
	id      SERIAL NOT NULL ,
	label   VARCHAR (255) NOT NULL  ,
	CONSTRAINT level_PK PRIMARY KEY (id)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: mumber
------------------------------------------------------------
CREATE TABLE public.mumber(
	id         SERIAL NOT NULL ,
	pseudo     VARCHAR (255) NOT NULL ,
	password   VARCHAR (255) NOT NULL ,
	id_level   INT  NOT NULL  ,
	CONSTRAINT mumber_PK PRIMARY KEY (id)

	,CONSTRAINT mumber_level_FK FOREIGN KEY (id_level) REFERENCES public.level(id)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: content
------------------------------------------------------------
CREATE TABLE public.content(
	id            SERIAL NOT NULL ,
	create_date   DATE  NOT NULL ,
	content       VARCHAR (2000)  NOT NULL ,
	alert         INT  NOT NULL ,
	id_chapter    INT  NOT NULL ,
	id_mumber     INT  NOT NULL  ,
	CONSTRAINT content_PK PRIMARY KEY (id)

	,CONSTRAINT content_chapter_FK FOREIGN KEY (id_chapter) REFERENCES public.chapter(id)
	,CONSTRAINT content_mumber0_FK FOREIGN KEY (id_mumber) REFERENCES public.mumber(id)
)WITHOUT OIDS;





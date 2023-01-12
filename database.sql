--
-- PostgreSQL database dump
--

-- Dumped from database version 10.12
-- Dumped by pg_dump version 10.12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: available_labels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.available_labels (
    id integer NOT NULL,
    label_name character varying
);


ALTER TABLE public.available_labels OWNER TO postgres;

--
-- Name: available_labels_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.available_labels_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.available_labels_id_seq OWNER TO postgres;

--
-- Name: available_labels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.available_labels_id_seq OWNED BY public.available_labels.id;


--
-- Name: entity_labels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.entity_labels (
    id integer NOT NULL,
    label_name character varying,
    entity_fk integer
);


ALTER TABLE public.entity_labels OWNER TO postgres;

--
-- Name: entity_labels_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.entity_labels_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.entity_labels_id_seq OWNER TO postgres;

--
-- Name: entity_labels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.entity_labels_id_seq OWNED BY public.entity_labels.id;


--
-- Name: entityes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.entityes (
    id integer NOT NULL,
    entity_type integer NOT NULL
);


ALTER TABLE public.entityes OWNER TO postgres;

--
-- Name: entityes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.entityes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.entityes_id_seq OWNER TO postgres;

--
-- Name: entityes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.entityes_id_seq OWNED BY public.entityes.id;


--
-- Name: available_labels id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.available_labels ALTER COLUMN id SET DEFAULT nextval('public.available_labels_id_seq'::regclass);


--
-- Name: entity_labels id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entity_labels ALTER COLUMN id SET DEFAULT nextval('public.entity_labels_id_seq'::regclass);


--
-- Name: entityes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entityes ALTER COLUMN id SET DEFAULT nextval('public.entityes_id_seq'::regclass);


--
-- Data for Name: available_labels; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.available_labels VALUES (1, 'label1');
INSERT INTO public.available_labels VALUES (2, 'label2');
INSERT INTO public.available_labels VALUES (3, 'label3');
INSERT INTO public.available_labels VALUES (4, 'label4');
INSERT INTO public.available_labels VALUES (5, 'label5');


--
-- Data for Name: entity_labels; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.entity_labels VALUES (69, 'label2', 1);
INSERT INTO public.entity_labels VALUES (70, 'label4', 1);
INSERT INTO public.entity_labels VALUES (71, 'label1', 1);


--
-- Data for Name: entityes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.entityes VALUES (1, 1);
INSERT INTO public.entityes VALUES (2, 2);
INSERT INTO public.entityes VALUES (3, 3);
INSERT INTO public.entityes VALUES (4, 2);
INSERT INTO public.entityes VALUES (5, 1);


--
-- Name: available_labels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.available_labels_id_seq', 5, true);


--
-- Name: entity_labels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.entity_labels_id_seq', 71, true);


--
-- Name: entityes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.entityes_id_seq', 5, true);


--
-- Name: available_labels available_labels_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.available_labels
    ADD CONSTRAINT available_labels_pkey PRIMARY KEY (id);


--
-- Name: entity_labels entity_labels_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entity_labels
    ADD CONSTRAINT entity_labels_pkey PRIMARY KEY (id);


--
-- Name: entityes entityes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entityes
    ADD CONSTRAINT entityes_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--


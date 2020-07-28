--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.1

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tokens (
    id integer NOT NULL,
    token character varying(255) NOT NULL,
    user_id integer NOT NULL,
    token_expires timestamp(0) without time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tokens OWNER TO postgres;

--
-- Name: tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tokens_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tokens_id_seq OWNER TO postgres;

--
-- Name: tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tokens_id_seq OWNED BY public.tokens.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone_number character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    user_image character varying(255),
    confirm_reg smallint DEFAULT '0'::smallint,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tokens ALTER COLUMN id SET DEFAULT nextval('public.tokens_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tokens (id, token, user_id, token_expires, created_at, updated_at) FROM stdin;
23	switchlink-5f0eb1cbdfd243.30557285	29	2020-07-15 11:35:39	\N	\N
24	switchlink-5f0eb1ecec9987.50657529	30	2020-07-15 11:36:12	\N	\N
25	switchlink-5f0eb2275eddc7.83424319	31	2020-07-15 11:37:11	\N	\N
26	switchlink-5f0eb256ba1b07.99959813	32	2020-07-15 11:37:58	\N	\N
27	switchlink-5f0eb2814b41a6.65436057	33	2020-07-15 11:38:41	\N	\N
28	switchlink-5f0eb32fb2dc27.08429777	34	2020-07-15 11:41:35	\N	\N
29	switchlink-5f0eb41f2df232.82810065	35	2020-07-15 11:45:35	\N	\N
30	switchlink-5f0eb5eae1df17.74427906	36	2020-07-15 11:53:14	\N	\N
31	switchlink-5f0eba82b42e24.92087852	37	2020-07-15 12:12:50	\N	\N
32	switchlink-5f0ebb3a6550d8.45224972	38	2020-07-15 12:15:54	\N	\N
33	switchlink-5f0ebbff4f0134.09809265	39	2020-07-15 12:19:11	\N	\N
34	switchlink-5f1fec752a8f13.79044553	40	2020-07-28 13:14:29	\N	\N
35	switchlink-5f1ff8cac59087.54595676	41	2020-07-28 14:07:06	\N	\N
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, first_name, last_name, email, phone_number, password, user_image, confirm_reg, remember_token, created_at, updated_at) FROM stdin;
29	Claire	Tillman	talysi@mailinator.com	+1 (899) 289-2965	$2y$10$7D89xJgNqrqkGsQbmJW78OM8RdSbpImmFI/BxDXDhFZpKoODy4/UW	\N	0	\N	\N	\N
30	Mannix	Galloway	dejuta@mailinator.com	+1 (315) 173-1827	$2y$10$WtBWThvO5.Ekxhn/EIOsXuDktpyzgW6Ad1WyrbSlj7T6iJZSuZBdi	\N	0	\N	\N	\N
31	Kirestin	Little	nusyfur@mailinator.com	+1 (388) 228-3057	$2y$10$SNffO.PtOYknkAQWQYOVY.44nt4myEGnrixDeBmAzIDTa92fq/Sny	\N	0	\N	\N	\N
32	Irene	Campbell	tiji@mailinator.com	+1 (579) 734-5624	$2y$10$ht0oVJUKSFu1Zj6I0fk/iu252GbOk3prGZjs9MOHShJMry5U7i12C	\N	0	\N	\N	\N
33	Emerson	Sexton	pagybicam@mailinator.com	+1 (405) 388-7746	$2y$10$UmTNtvh6LFKXrBjmZMCfsO1SeuRSO0Tl2hiZKMC6u3Z1EBcz3Dg86	\N	0	\N	\N	\N
34	Anjolie	Harris	sofaw@mailinator.com	+1 (118) 887-4834	$2y$10$wRidzE0Lo64iA4KK14uJHO0dUdPmTwTvhQJhnJUJuyeKmJIV2JGm6	\N	0	\N	\N	\N
35	Karyn	Terrell	tuqenid@mailinator.com	+1 (552) 909-9101	$2y$10$ZadRA0.ad1WlAZztlr.UyOrDcSGrr2uT4ZlBTP.WdfnKp5XHKy9nO	\N	0	\N	\N	\N
36	Madonna	Kirk	vixif@mailinator.com	+1 (279) 514-4629	$2y$10$axlel/UG3IGOpxUvzS4i5uJaIEmwt/Bs53pmZqPMjNWW9rPttq4Qu	\N	0	\N	\N	\N
37	Reese	Dale	caziqyhe@mailinator.com	+1 (509) 527-7788	$2y$10$xz.LYFSkmMY/fIPkohjpUefXSQ3JQrmpVj59eJoCi5q4OfcNicyZ2	\N	0	\N	\N	\N
38	Sigourney	Hodge	gigafucevy@mailinator.com	+1 (406) 797-5128	$2y$10$uxwNkJcwplPyObiuogZfOu1zXXpuulCpnrv81GPClKV8bMHdNu2tC	\N	1	\N	\N	\N
39	Maggy	Dickson	giloqynoka@mailinator.com	+1 (952) 347-7783	$2y$10$j1pS6sKaeJIFwlJibahIB.bRhGBquNUbNW4XaYJNlOPjX8W/hvheC	\N	1	\N	\N	\N
40	Griffin	Harrington	qazevuvo@mailinator.com	+1 (126) 483-8751	$2y$10$d8mm75rmovzq0ImSWAo0oeVXOGxAjRF/Cz1DX99P7ppf.N40tcl8u	\N	1	\N	\N	\N
41	Caroline	Gitonga	carolgitonga45@gmail.com	0701154836	$2y$10$63IpKqAHq1gnDA60vyPdIOHiudjd38Di0OlDjWEKjdBSiyhDBKZDG	\N	1	\N	\N	\N
\.


--
-- Name: tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tokens_id_seq', 35, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 41, true);


--
-- Name: tokens tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tokens
    ADD CONSTRAINT tokens_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_phone_number_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_phone_number_unique UNIQUE (phone_number);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: tokens tokens_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tokens
    ADD CONSTRAINT tokens_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--


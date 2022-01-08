--
-- PostgreSQL database dump
--

-- Dumped from database version 14.1
-- Dumped by pg_dump version 14.1

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
-- Name: albums; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.albums (
    id bigint NOT NULL,
    nome character varying(100) NOT NULL,
    "Likes" integer NOT NULL,
    id_artista bigint NOT NULL,
    capa character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.albums OWNER TO postgres;

--
-- Name: albums_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.albums_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.albums_id_seq OWNER TO postgres;

--
-- Name: albums_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.albums_id_seq OWNED BY public.albums.id;


--
-- Name: artists; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.artists (
    id bigint NOT NULL,
    nome character varying(100) NOT NULL,
    "Data_de_nascimento" date NOT NULL,
    "Likes" integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.artists OWNER TO postgres;

--
-- Name: artists_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.artists_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.artists_id_seq OWNER TO postgres;

--
-- Name: artists_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.artists_id_seq OWNED BY public.artists.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: generos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.generos (
    id bigint NOT NULL,
    nome character varying(100) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.generos OWNER TO postgres;

--
-- Name: generos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.generos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.generos_id_seq OWNER TO postgres;

--
-- Name: generos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.generos_id_seq OWNED BY public.generos.id;


--
-- Name: messages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.messages (
    id bigint NOT NULL,
    user_id integer NOT NULL,
    message text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.messages OWNER TO postgres;

--
-- Name: messages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.messages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.messages_id_seq OWNER TO postgres;

--
-- Name: messages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.messages_id_seq OWNED BY public.messages.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: musica_playlist; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.musica_playlist (
    id bigint NOT NULL,
    id_musica bigint NOT NULL,
    id_playlist bigint NOT NULL
);


ALTER TABLE public.musica_playlist OWNER TO postgres;

--
-- Name: musica_playlist_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.musica_playlist_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.musica_playlist_id_seq OWNER TO postgres;

--
-- Name: musica_playlist_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.musica_playlist_id_seq OWNED BY public.musica_playlist.id;


--
-- Name: musicas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.musicas (
    id bigint NOT NULL,
    nome character varying(100) NOT NULL,
    path character varying(255) NOT NULL,
    "Likes" integer NOT NULL,
    duracao character varying(255) NOT NULL,
    id_artista bigint NOT NULL,
    id_album bigint NOT NULL,
    id_genero bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.musicas OWNER TO postgres;

--
-- Name: musicas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.musicas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.musicas_id_seq OWNER TO postgres;

--
-- Name: musicas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.musicas_id_seq OWNED BY public.musicas.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: playlists; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.playlists (
    id bigint NOT NULL,
    nome character varying(100) NOT NULL,
    "Likes" integer NOT NULL,
    id_user bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.playlists OWNER TO postgres;

--
-- Name: playlists_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.playlists_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.playlists_id_seq OWNER TO postgres;

--
-- Name: playlists_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.playlists_id_seq OWNED BY public.playlists.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    "id_lastAlbum" bigint,
    "id_lastPlaylist" bigint,
    email_verified_at timestamp(0) without time zone,
    type integer DEFAULT 0 NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
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
-- Name: websockets_statistics_entries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.websockets_statistics_entries (
    id integer NOT NULL,
    app_id character varying(255) NOT NULL,
    peak_connection_count integer NOT NULL,
    websocket_message_count integer NOT NULL,
    api_message_count integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.websockets_statistics_entries OWNER TO postgres;

--
-- Name: websockets_statistics_entries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.websockets_statistics_entries_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.websockets_statistics_entries_id_seq OWNER TO postgres;

--
-- Name: websockets_statistics_entries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.websockets_statistics_entries_id_seq OWNED BY public.websockets_statistics_entries.id;


--
-- Name: albums id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.albums ALTER COLUMN id SET DEFAULT nextval('public.albums_id_seq'::regclass);


--
-- Name: artists id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.artists ALTER COLUMN id SET DEFAULT nextval('public.artists_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: generos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.generos ALTER COLUMN id SET DEFAULT nextval('public.generos_id_seq'::regclass);


--
-- Name: messages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.messages ALTER COLUMN id SET DEFAULT nextval('public.messages_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: musica_playlist id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.musica_playlist ALTER COLUMN id SET DEFAULT nextval('public.musica_playlist_id_seq'::regclass);


--
-- Name: musicas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.musicas ALTER COLUMN id SET DEFAULT nextval('public.musicas_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: playlists id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.playlists ALTER COLUMN id SET DEFAULT nextval('public.playlists_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: websockets_statistics_entries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.websockets_statistics_entries ALTER COLUMN id SET DEFAULT nextval('public.websockets_statistics_entries_id_seq'::regclass);


--
-- Data for Name: albums; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.albums (id, nome, "Likes", id_artista, capa, created_at, updated_at) FROM stdin;
2	illmatic	33	1	illmatic.jpg	2022-01-07 23:50:40	2022-01-07 23:50:40
1	Kanye West Best Songs	89	2	kanye.jpg	2022-01-07 23:50:16	2022-01-08 00:27:01
3	Maria Leal Hit Songs	1	3	maria.jpg	2022-01-08 00:32:55	2022-01-08 00:32:55
4	20 anos de Tony Carreira	3333	4	tony.jpg	2022-01-08 00:36:36	2022-01-08 00:36:36
5	Rock Xutos	89	5	xutos.jpg	2022-01-08 00:39:07	2022-01-08 00:39:07
6	Real Slim Shady	89	6	ddd.png	2022-01-08 00:39:36	2022-01-08 00:39:36
7	Rip 2pac	333	7	2pac.jpg	2022-01-08 00:53:04	2022-01-08 00:53:04
8	The Notorious	89	8	big.jpg	2022-01-08 00:53:28	2022-01-08 00:53:28
9	Enter the Wu-Tang Clan	500000	9	enterthewutang.jpg	2022-01-08 00:54:10	2022-01-08 00:54:10
10	StraightOuttaCardielos	500000	10	StraightOuttaCardielos.jpg	2022-01-08 01:10:39	2022-01-08 01:10:39
\.


--
-- Data for Name: artists; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.artists (id, nome, "Data_de_nascimento", "Likes", created_at, updated_at) FROM stdin;
1	Nas	2000-03-31	332	2022-01-07 23:49:21	2022-01-07 23:49:21
2	Kanye West	1998-03-31	3233	2022-01-07 23:49:32	2022-01-07 23:49:32
3	Maria Leal	2000-03-31	1	2022-01-08 00:24:56	2022-01-08 00:24:56
4	Tony Carreira	1996-03-31	89	2022-01-08 00:35:49	2022-01-08 00:35:49
5	Xutos & Pontapés	3333-03-31	89	2022-01-08 00:37:59	2022-01-08 00:37:59
6	Eminem	3333-03-03	33333	2022-01-08 00:38:28	2022-01-08 00:38:28
7	2pac	4444-03-31	500000	2022-01-08 00:51:36	2022-01-08 00:51:36
8	B.I.G	0333-03-31	333	2022-01-08 00:52:02	2022-01-08 00:52:02
9	Wu-Tang Clan	3333-03-31	89	2022-01-08 00:52:33	2022-01-08 00:52:33
10	Mclawyer	2001-07-05	366666	2022-01-08 01:09:58	2022-01-08 01:09:58
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: generos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.generos (id, nome, created_at, updated_at) FROM stdin;
1	Trap	2022-01-07 23:48:44	2022-01-07 23:48:44
\.


--
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.messages (id, user_id, message, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
63	2022_01_05_005450_create_receivers_table	4
131	0000_00_00_000000_create_websockets_statistics_entries_table	5
132	2014_10_12_100000_create_password_resets_table	5
133	2019_08_19_000000_create_failed_jobs_table	5
134	2019_10_12_000000_create_artists_table	5
135	2019_12_14_000001_create_personal_access_tokens_table	5
136	2020_12_10_093558_create_generos_table	5
137	2021_12_09_011011_create_albums_table	5
138	2021_12_09_011043_create_musicas_table	5
139	2021_12_10_102115_create_musica_playlist_table	5
140	2022_01_05_005450_create_messages_table	5
141	2022_10_12_000000_create_users_table	5
142	2022_12_09_011023_create_playlists_table	5
143	2022_20_07_233902_add_user_playlist_fk	5
144	2022_22_22_012434_userplaylistfk	6
145	2022_121_08_013711_user_lastplaylist	7
\.


--
-- Data for Name: musica_playlist; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.musica_playlist (id, id_musica, id_playlist) FROM stdin;
1	2	1
2	1	1
3	3	3
4	6	3
5	7	3
6	29	4
7	6	4
8	33	4
\.


--
-- Data for Name: musicas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.musicas (id, nome, path, "Likes", duracao, id_artista, id_album, id_genero, created_at, updated_at) FROM stdin;
3	Nas_Halftime	Nas_Halftime.mp3	89	3.10	1	2	1	2022-01-08 00:28:13	2022-01-08 00:28:41
4	Nas_It_Aint_Hard_to_Tell	Nas_It_Aint_Hard_to_Tell.mp3	89	3.10	1	2	1	2022-01-08 00:29:08	2022-01-08 00:29:08
5	Nas_Lifes_A_Bitch	Nas_Lifes_A_Bitch.mp3	89	3.10	1	2	1	2022-01-08 00:29:28	2022-01-08 00:29:28
6	Nas_Memory_Lane	Nas_Memory_Lane.mp3	89	3.10	1	2	1	2022-01-08 00:29:44	2022-01-08 00:29:44
7	Nas_NYState_Of_Mind	Nas_NYState_Of_Mind.mp3	89	3.10	1	2	1	2022-01-08 00:30:04	2022-01-08 00:30:04
8	All Mine	All Mine.mp3	89	3.10	2	1	1	2022-01-08 00:30:51	2022-01-08 00:30:51
9	Heartless	Heartless.mp3	89	3.10	2	1	1	2022-01-08 00:31:21	2022-01-08 00:31:30
10	Kanye West - Gold Digger ft. Jamie Foxx	Kanye West - Gold Digger ft. Jamie Foxx.mp3	89	3.10	2	1	1	2022-01-08 00:31:55	2022-01-08 00:32:03
11	Tá Demais	MARIA LEAL - TA DEMAIS (VIDEOCLIP OFICIAL).mp3	1	3.10	3	3	1	2022-01-08 00:34:36	2022-01-08 00:34:36
12	Hoje aqui só para ti	Maria Leal hoje aqui só para ti - Você na TV.mp3	1	3.10	3	3	1	2022-01-08 00:35:16	2022-01-08 00:35:16
13	A Saudade de Ti	Tony Carreira - A Saudade de Ti.mp3	89	3.10	4	4	1	2022-01-08 00:42:54	2022-01-08 00:42:54
14	Depois de ti mais nada	Tony Carreira - Depois de ti mais nada (Official Video).mp3	89	3.10	4	4	1	2022-01-08 00:43:17	2022-01-08 00:43:17
16	A Minha Casinha	A Minha Casinha.mp3	89	3.10	5	5	1	2022-01-08 00:44:33	2022-01-08 00:44:33
17	O Homem Do Leme	O Homem Do Leme.mp3	89	3.10	5	5	1	2022-01-08 00:45:01	2022-01-08 00:45:01
18	Às vezes	Xutos  Pontapés - Às vezes.mp3	89	3.10	5	5	1	2022-01-08 00:45:29	2022-01-08 00:45:29
19	Lose Yourself	Eminem - Lose Yourself [HD].mp3	500000	4.20	6	6	1	2022-01-08 00:46:16	2022-01-08 00:46:16
20	The Real Slim Shady	Eminem - The Real Slim Shady (Edited).mp3	89	4.20	6	6	1	2022-01-08 00:46:36	2022-01-08 00:46:36
21	Without Me	Eminem - Without Me.mp3	89	4.20	6	6	1	2022-01-08 00:47:00	2022-01-08 00:47:00
15	Sonhos de menino	Tony Carreira - Sonhos de menino.mp3	89	3.10	4	4	1	2022-01-08 00:43:38	2022-01-08 00:43:38
22	California Love	2Pac - California Love feat. Dr. Dre.mp3	89	3.10	7	7	1	2022-01-08 00:55:35	2022-01-08 00:55:35
23	Changes	2Pac - Changes ft. Talent.mp3	89	3.10	7	7	1	2022-01-08 00:55:57	2022-01-08 00:55:57
24	Hit Em Up	2Pac - Hit Em Up.mp3	89	3.10	7	7	1	2022-01-08 00:58:36	2022-01-08 00:59:01
25	Ready To Die	06. Ready To Die.mp3	500000	4.20	8	8	1	2022-01-08 01:01:58	2022-01-08 01:01:58
26	Who Shot Ya	18. Who Shot Ya.mp3	500000	3.10	8	8	1	2022-01-08 01:02:22	2022-01-08 01:02:22
27	Gimme The Loot	03. Gimme The Loot.mp3	500000	3.10	8	8	1	2022-01-08 01:03:01	2022-01-08 01:03:01
28	Suicidal Thoughts	17. Suicidal Thoughts.mp3	3333	3.10	8	8	1	2022-01-08 01:03:52	2022-01-08 01:03:52
29	Protect Ya Neck	Protect Ya Neck.mp3	33332	4.20	9	9	1	2022-01-08 01:07:05	2022-01-08 01:07:05
30	ShameOnANigga	ShameOnANigga.mp3	89	4.20	9	9	1	2022-01-08 01:07:30	2022-01-08 01:07:30
31	Wu-Tang 7th Chamber	Wu-Tang 7th Chamber.mp3	89	3.10	9	9	1	2022-01-08 01:07:59	2022-01-08 01:07:59
32	Wu-Tang 7th Chamber - Part II	Wu-Tang 7th Chamber - Part II.mp3	89	3.10	9	9	1	2022-01-08 01:08:16	2022-01-08 01:08:16
33	obstinatus	obstinatus.mp3	89	3.10	10	10	1	2022-01-08 01:11:35	2022-01-08 01:11:35
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: playlists; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.playlists (id, nome, "Likes", id_user, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, "id_lastAlbum", "id_lastPlaylist", email_verified_at, type, password, remember_token, created_at, updated_at) FROM stdin;
3	Diogo Ferreira	diogoferreira299@gmail.com	1	\N	2022-01-08 01:19:20	2	$2y$10$xv05KwC8D.CXa5hW23N.EuVCWaM/mGIgO7UrmrOLaqPeb4Q.9lWoC	\N	2022-01-08 01:19:13	2022-01-08 01:19:20
\.


--
-- Data for Name: websockets_statistics_entries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.websockets_statistics_entries (id, app_id, peak_connection_count, websocket_message_count, api_message_count, created_at, updated_at) FROM stdin;
\.


--
-- Name: albums_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.albums_id_seq', 10, true);


--
-- Name: artists_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.artists_id_seq', 10, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: generos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.generos_id_seq', 1, true);


--
-- Name: messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.messages_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 145, true);


--
-- Name: musica_playlist_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.musica_playlist_id_seq', 8, true);


--
-- Name: musicas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.musicas_id_seq', 33, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: playlists_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.playlists_id_seq', 4, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 3, true);


--
-- Name: websockets_statistics_entries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.websockets_statistics_entries_id_seq', 1, false);


--
-- Name: albums albums_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.albums
    ADD CONSTRAINT albums_pkey PRIMARY KEY (id);


--
-- Name: artists artists_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.artists
    ADD CONSTRAINT artists_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: generos generos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.generos
    ADD CONSTRAINT generos_pkey PRIMARY KEY (id);


--
-- Name: messages messages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: musica_playlist musica_playlist_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.musica_playlist
    ADD CONSTRAINT musica_playlist_pkey PRIMARY KEY (id);


--
-- Name: musicas musicas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.musicas
    ADD CONSTRAINT musicas_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: playlists playlists_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.playlists
    ADD CONSTRAINT playlists_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_name_unique UNIQUE (name);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: websockets_statistics_entries websockets_statistics_entries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.websockets_statistics_entries
    ADD CONSTRAINT websockets_statistics_entries_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: musicas id_album_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.musicas
    ADD CONSTRAINT id_album_fk FOREIGN KEY (id_album) REFERENCES public.albums(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: albums id_artista_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.albums
    ADD CONSTRAINT id_artista_fk FOREIGN KEY (id_artista) REFERENCES public.artists(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: musicas id_artista_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.musicas
    ADD CONSTRAINT id_artista_fk FOREIGN KEY (id_artista) REFERENCES public.artists(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: musicas id_genero_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.musicas
    ADD CONSTRAINT id_genero_fk FOREIGN KEY (id_genero) REFERENCES public.generos(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: users id_lastAlbum_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT "id_lastAlbum_fk" FOREIGN KEY ("id_lastAlbum") REFERENCES public.albums(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: playlists id_user_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.playlists
    ADD CONSTRAINT id_user_fk FOREIGN KEY (id_user) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: users users_id_lastplaylist_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_id_lastplaylist_foreign FOREIGN KEY ("id_lastPlaylist") REFERENCES public.playlists(id) ON UPDATE CASCADE;


--
-- PostgreSQL database dump complete
--


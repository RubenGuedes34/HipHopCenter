--
-- PostgreSQL database dump
--

-- Dumped from database version 12.9 (Ubuntu 12.9-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.9 (Ubuntu 12.9-0ubuntu0.20.04.1)

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
11	Long. Live.  ASAP	89	11	asap.jpg	2022-01-11 09:48:25	2022-01-11 09:48:25
12	The Kendrick Lamar EP	89	12	kendrick.jpg	2022-01-11 09:50:38	2022-01-11 09:50:38
14	Certified Lover Boy	89	14	drake.jpg	2022-01-11 09:54:59	2022-01-11 09:55:11
13	The Off-Season	89	13	jcole.jpg	2022-01-11 09:53:56	2022-01-11 09:55:22
15	Bobby Tarantino	89	15	logic.jpg	2022-01-11 09:56:33	2022-01-11 09:56:33
16	Astroworld	89	16	travis.jpeg	2022-01-11 09:57:22	2022-01-11 09:57:22
17	Man on the Moon: The End of Day	89	17	cudi.jpg	2022-01-11 09:58:36	2022-01-11 09:58:36
18	The Goat	89	18	polog.jpg	2022-01-11 09:59:23	2022-01-11 09:59:23
19	21 Gang	89	19	21.jpg	2022-01-11 10:00:19	2022-01-11 10:00:19
20	ADHD	89	20	joyner.jpg	2022-01-11 10:01:08	2022-01-11 10:01:08
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
11	ASAP Rocky	2222-01-03	89	2022-01-11 09:47:17	2022-01-11 09:47:17
12	Kendrick Lamar	3333-03-23	232	2022-01-11 09:49:55	2022-01-11 09:49:55
13	J. Cole	3333-03-31	2	2022-01-11 09:53:25	2022-01-11 09:53:25
14	Drake	0333-03-31	89	2022-01-11 09:54:12	2022-01-11 09:54:12
15	Logic	3333-03-01	89	2022-01-11 09:55:58	2022-01-11 09:55:58
16	Travis Scott	3333-02-01	89	2022-01-11 09:57:01	2022-01-11 09:57:01
17	Kid Cudi	3333-03-31	333	2022-01-11 09:58:11	2022-01-11 09:58:11
18	Polo G	3233-03-31	89	2022-01-11 09:58:53	2022-01-11 09:58:53
19	21 Savage	3333-03-31	89	2022-01-11 09:59:40	2022-01-11 09:59:40
20	Joyner Lucas	3333-03-23	89	2022-01-11 10:00:41	2022-01-11 10:00:41
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
9	3	6
12	7	6
13	33	6
14	26	6
15	10	6
16	8	6
17	12	6
18	31	6
19	3	8
20	3	8
21	4	8
22	8	9
23	9	9
24	10	9
25	22	9
26	20	9
27	21	9
28	19	9
29	26	9
30	13	10
31	14	10
32	16	10
33	17	10
34	18	10
35	15	10
36	11	11
37	12	11
38	33	11
39	3	12
40	4	12
41	28	13
42	23	13
43	15	13
44	14	13
45	17	13
46	10	13
47	9	13
48	5	13
49	11	15
50	12	15
51	13	15
52	14	15
53	15	15
54	25	15
55	16	16
56	15	16
57	28	17
58	4	17
59	5	17
60	7	17
62	15	18
63	11	18
64	12	18
65	11	19
66	12	19
67	15	19
68	3	20
69	4	20
70	42	20
71	70	20
73	5	21
74	8	22
75	9	22
76	22	22
77	21	22
78	20	22
79	46	22
80	47	22
81	48	22
82	49	22
83	52	22
84	55	22
85	51	22
86	58	22
87	68	22
88	67	22
89	53	22
90	64	22
91	61	22
92	15	22
93	16	22
94	38	22
95	40	22
96	41	22
97	42	22
100	60	22
101	44	22
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
34	My Dads Gone Crazy	My Dads Gone Crazy.mp3	323	3.10	6	6	1	2022-01-11 09:44:40	2022-01-11 09:44:40
35	Till I Collapse	Till I Collapse.mp3	89	3.10	6	6	1	2022-01-11 09:45:01	2022-01-11 09:45:01
36	Off The Grid	Kanye West - Off The Grid (Official Audio).mp3	89	3.10	2	1	1	2022-01-11 09:45:32	2022-01-11 09:45:32
37	Praise God	Kanye West - Praise God (Official Audio).mp3	89	3.10	2	1	1	2022-01-11 09:45:53	2022-01-11 09:45:53
38	Bound 2	Kanye West - Bound 2 (Explicit).mp3	89	3.10	2	1	1	2022-01-11 09:46:09	2022-01-11 09:46:09
40	Praise The Lord	AAP Rocky - Praise The Lord (Da Shine) (Official Video) ft. Skepta.mp3	89	3.10	11	11	1	2022-01-11 09:48:51	2022-01-11 09:48:51
41	LSD	AAP Rocky - LSD.mp3	89	3.10	11	11	1	2022-01-11 09:49:05	2022-01-11 09:49:05
42	Stan	Eminem - Stan (Lyrics) ft. Dido.mp3	89	3.10	6	6	1	2022-01-11 09:49:35	2022-01-11 09:49:35
43	family ties	Baby Keem, Kendrick Lamar - family ties (Official Video).mp3	89	3.10	12	12	1	2022-01-11 09:51:01	2022-01-11 09:51:01
44	King Kunta	Kendrick Lamar - King Kunta.mp3	89	3.10	12	12	1	2022-01-11 09:51:16	2022-01-11 09:51:16
45	HUMBLE	Kendrick Lamar - HUMBLE..mp3	89	3.10	12	12	1	2022-01-11 09:51:33	2022-01-11 09:51:33
46	MIDDLE CHILD	J. Cole - MIDDLE CHILD (Official Music Video).mp3	89	3.10	13	13	1	2022-01-11 10:01:52	2022-01-11 10:01:52
47	G.O.M.D	J. Cole - G.O.M.D..mp3	89	4.20	13	13	1	2022-01-11 10:02:09	2022-01-11 10:02:09
48	No Role Modelz	J.Cole - No Role Modelz.mp3	500000	4.20	13	13	1	2022-01-11 10:02:27	2022-01-11 10:02:27
49	ISIS	Joyner Lucas ft. Logic - ISIS (ADHD).mp3	500000	4.20	20	20	1	2022-01-11 10:03:01	2022-01-11 10:03:01
50	Ramen	Joyner Lucas Lil Baby - Ramen OJ.mp3	89	4.20	20	20	1	2022-01-11 10:03:18	2022-01-11 10:03:18
51	Lucky You	Lucky You (Feat. Joyner Lucas) [Official Audio].mp3	89	3.10	20	20	1	2022-01-11 10:03:34	2022-01-11 10:03:34
52	Going Bad	Meek Mill, Drake - Going Bad (Lyrics).mp3	89	4.20	14	14	1	2022-01-11 10:04:08	2022-01-11 10:04:08
54	Nice For What	Drake - Nice For What.mp3	89	3.10	14	14	1	2022-01-11 10:04:47	2022-01-11 10:04:47
55	Homicide	Logic - Homicide (feat. Eminem) (Official Audio).mp3	89	4.20	15	15	1	2022-01-11 10:05:13	2022-01-11 10:05:13
56	Everyday	Logic, Marshmello - Everyday.mp3	89	3.10	15	15	1	2022-01-11 10:05:27	2022-01-11 10:05:27
57	Ballin	Logic - Ballin (ft. Castro) (Prod. Arthur McArthur).mp3	89	3.10	15	15	1	2022-01-11 10:05:40	2022-01-11 10:05:40
58	goosebumps	Travis Scott - goosebumps ft. Kendrick Lamar.mp3	89	3.10	16	16	1	2022-01-11 10:06:22	2022-01-11 10:06:22
59	SICKO MODE	Travis Scott - SICKO MODE ft. Drake.mp3	89	3.10	16	16	1	2022-01-11 10:06:39	2022-01-11 10:06:39
60	HIGHEST IN THE ROOM	Travis Scott - HIGHEST IN THE ROOM.mp3	89	3.10	16	16	1	2022-01-11 10:06:55	2022-01-11 10:06:55
61	Mr. Rager	Mr. Rager.mp3	89	3.10	17	17	1	2022-01-11 10:07:24	2022-01-11 10:07:24
62	Pursuit Of Happiness	Kid Cudi - Pursuit Of Happiness ft. MGMT.mp3	89	4.20	17	17	1	2022-01-11 10:07:42	2022-01-11 10:07:42
63	Day N Nite	Kid Cudi - Day N Nite.mp3	89	4.20	17	17	1	2022-01-11 10:08:00	2022-01-11 10:08:00
64	Erase Me	Kid Cudi - Erase Me ft. Kanye West.mp3	89	3.10	17	17	1	2022-01-11 10:08:16	2022-01-11 10:08:16
65	RAPSTAR	Polo G - RAPSTAR (Official Video).mp3	89	3.10	18	18	1	2022-01-11 10:08:44	2022-01-11 10:08:44
66	Bad Man	Polo G - Bad Man (Smooth Criminal) [Official Video].mp3	89	3.10	18	18	1	2022-01-11 10:09:03	2022-01-11 10:09:03
67	Pop Out	Polo G Feat. Lil Tjay - Pop Out _By. Ryan Lynch.mp3	33	3.10	18	18	1	2022-01-11 10:09:19	2022-01-11 10:09:19
68	10 Freaky Girls	Metro Boomin - 10 Freaky Girls (with 21 Savage) [OFFICIAL AUDIO].mp3	89	3.10	19	19	1	2022-01-11 10:09:54	2022-01-11 10:09:54
69	a lot	21 Savage - a lot ft. J. Cole.mp3	500000	3.10	19	19	1	2022-01-11 10:10:08	2022-01-11 10:10:08
70	Bank Account	21 Savage - Bank Account (Official Audio).mp3	89	3.10	19	19	1	2022-01-11 10:10:27	2022-01-11 10:10:27
53	Im Upset	Drake   Im Upset.mp3	500000	4.20	14	14	1	2022-01-11 10:04:26	2022-01-11 12:15:52
39	Ni***s In Paris	Jay-Z  Kanye West - Nias In Paris (Explicit).mp3	89	3.10	2	1	1	2022-01-11 09:46:42	2022-01-11 12:20:58
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
8	xerecrazy	0	4	2022-01-08 13:12:46	2022-01-08 13:12:46
10	PT	0	3	2022-01-08 14:34:39	2022-01-08 14:34:39
11	meme	0	3	2022-01-08 14:37:05	2022-01-08 14:37:05
13	Musicas para alternas	0	13	2022-01-09 15:50:35	2022-01-09 15:50:35
15	Ricardo Fazeres 2022	0	14	2022-01-09 16:02:01	2022-01-09 16:02:01
16	jose carlos playlist	0	15	2022-01-09 17:59:43	2022-01-09 17:59:43
17	Pular	0	16	2022-01-09 19:50:04	2022-01-09 19:50:04
19	SummerVibes	0	19	2022-01-10 18:53:43	2022-01-10 18:53:43
22	Bangers	0	3	2022-01-12 10:34:00	2022-01-12 10:34:00
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, "id_lastAlbum", "id_lastPlaylist", email_verified_at, type, password, remember_token, created_at, updated_at) FROM stdin;
5	Ricardo Sanguedo	reidelas69@gmail.com	\N	\N	\N	0	$2y$10$Ev5KMsxjHdn1x4nWUR45BeHPqQnHOVohd1ksaL6SZfQbYYfl6Kmle	\N	2022-01-08 03:05:58	2022-01-08 03:05:58
6	Tiago Temotio	temotio@gmail.com	\N	\N	2022-01-08 03:20:44	0	$2y$10$kwyQRTukZd6bnMbGxgZtk.I4In9JnLn.f5dFQFV3XubhTFKYdU7Wu	\N	2022-01-08 03:17:55	2022-01-08 03:20:44
19	Jorge Pereira	jorge@email.com	13	19	2022-01-10 18:46:26	1	$2y$10$htTu0AWgJXUocTsq1wRt.uWqXJTHtga3fq9f8/.19sCvFJV7mv9b6	\N	2022-01-10 18:39:49	2022-01-11 15:47:31
11	Ruben	ruben34@gmail.com	\N	\N	2022-01-08 18:27:29	2	 $2y$10$xv05KwC8D.CXa5hW23N.EuVCWaM/mGIgO7UrmrOLaqPeb4Q.9lWoC	\N	2022-01-08 18:25:45	2022-01-08 18:27:51
12	Rbn	rbn@gmail.com	\N	\N	2022-01-08 20:40:28	0	$2y$10$iZDk.Em6Kjzvn6MqZfF.rOZiacxRD1.tLxWFb./4tLJxi8kBnIYuK	\N	2022-01-08 20:40:07	2022-01-08 20:40:28
9	Diogo	diogoferreira@gmail.com	\N	\N	\N	0	$2y$10$T0j.3bIkMOLMoX57NVEKHu1CqRAbcKl3K7glcveYg4cXAH0mH8Lkm	\N	2022-01-08 03:48:40	2022-01-08 03:48:40
14	Afonso Manso	ampmmanso@gmail.com	\N	15	2022-01-09 15:53:39	1	$2y$10$qhdfr6gwabM8yM230jncB.NUyjpLJ6aNp9J8RdfJ4ikbHhNYyL8Yi	\N	2022-01-09 15:50:52	2022-01-09 15:53:39
21	Paaaaaara kinito	nerdsdaUFP@gmail.com	4	19	2022-01-10 18:47:22	1	 $2y$10$sJEIp5k/3p1lb3P0nkq1A./2FZlKqLel0K9IWNNjpFM6TrMRiKUse	\N	2022-01-10 18:47:18	2022-01-10 18:57:37
23	Marcia	marcia@gmail.com	14	19	2022-01-11 10:15:21	1	$2y$10$vzwVF9WH4e4zi1wGIKXZNOaZLYiHI/BGPBQ0RrIPUCEiiUycF86yq	\N	2022-01-11 10:15:04	2022-01-11 10:15:21
3	Diogo Ferreira	diogoferreira299@gmail.com	19	22	2022-01-08 01:19:20	2	$2y$10$sJEIp5k/3p1lb3P0nkq1A./2FZlKqLel0K9IWNNjpFM6TrMRiKUse	\N	2022-01-08 01:19:13	2022-01-12 10:39:09
16	nighter	ns.randomword@gmail.com	8	8	2022-01-09 19:21:35	1	$2y$10$cYP9YRo.zgFPViJc42XT7u.07vzUAoHAyIK1JfCaTP34qYlNI3wVq	\N	2022-01-09 19:20:46	2022-01-09 19:21:35
4	Tomás Oliveira	tomasoliveira1018@gmail.com	18	8	2022-01-08 03:48:41	2	$2y$10$SP2MqO5fAYWGUgSrC9cXrOG92BWf4XuSaBoeO9uOf.85W.f2oTVpi	\N	2022-01-08 02:57:12	2022-01-08 03:48:41
15	José Carlos	josecarlos@gmail.com	1	16	2022-01-09 17:58:02	1	$2y$10$Z8wkXFxZ4Ineon5QENpDJufnzOOs9gKFgrhxtEU24FYmX72Vsv9Lm	\N	2022-01-09 17:57:47	2022-01-09 17:58:02
13	Raul Meireles	raulmeirelesbossfoda@gmail.com	6	\N	2022-01-09 15:45:59	1	$2y$10$fqDc9yl.LZ2y0vO1rZRjLOQ3AgDR84wLOzYoqcQAEUryOr036uahq	\N	2022-01-09 15:43:37	2022-01-09 15:45:59
\.


--
-- Data for Name: websockets_statistics_entries; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.websockets_statistics_entries (id, app_id, peak_connection_count, websocket_message_count, api_message_count, created_at, updated_at) FROM stdin;
\.


--
-- Name: albums_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.albums_id_seq', 20, true);


--
-- Name: artists_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.artists_id_seq', 20, true);


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

SELECT pg_catalog.setval('public.musica_playlist_id_seq', 101, true);


--
-- Name: musicas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.musicas_id_seq', 70, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: playlists_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.playlists_id_seq', 22, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 23, true);


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


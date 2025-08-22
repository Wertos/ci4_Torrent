--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: location; Type: TYPE; Schema: public; Owner: torrent
--

CREATE TYPE public.location AS ENUM (
    'torrent',
    'news'
);


ALTER TYPE public.location OWNER TO torrent;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admin_log; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.admin_log (
    id integer NOT NULL,
    user_id integer NOT NULL,
    event_data character varying(255) NOT NULL,
    event_userid integer NOT NULL,
    date timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.admin_log OWNER TO torrent;

--
-- Name: admin_log_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.admin_log_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.admin_log_id_seq OWNER TO torrent;

--
-- Name: admin_log_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.admin_log_id_seq OWNED BY public.admin_log.id;


--
-- Name: auth_groups_users; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.auth_groups_users (
    id integer NOT NULL,
    user_id integer NOT NULL,
    "group" character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL
);


ALTER TABLE public.auth_groups_users OWNER TO torrent;

--
-- Name: auth_groups_users_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.auth_groups_users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.auth_groups_users_id_seq OWNER TO torrent;

--
-- Name: auth_groups_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.auth_groups_users_id_seq OWNED BY public.auth_groups_users.id;


--
-- Name: auth_identities; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.auth_identities (
    id integer NOT NULL,
    user_id integer NOT NULL,
    type character varying(255) NOT NULL,
    name character varying(255),
    secret character varying(255) NOT NULL,
    secret2 character varying(255),
    expires timestamp without time zone,
    extra text,
    last_used_at timestamp without time zone,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    force_reset smallint DEFAULT 0
);


ALTER TABLE public.auth_identities OWNER TO torrent;

--
-- Name: auth_identities_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.auth_identities_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.auth_identities_id_seq OWNER TO torrent;

--
-- Name: auth_identities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.auth_identities_id_seq OWNED BY public.auth_identities.id;


--
-- Name: auth_logins; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.auth_logins (
    id integer NOT NULL,
    ip_address character varying(255) NOT NULL,
    user_agent character varying(255) DEFAULT NULL::character varying,
    id_type character varying(255) NOT NULL,
    identifier character varying(255) NOT NULL,
    user_id integer,
    date timestamp without time zone NOT NULL,
    success smallint
);


ALTER TABLE public.auth_logins OWNER TO torrent;

--
-- Name: auth_logins_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.auth_logins_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.auth_logins_id_seq OWNER TO torrent;

--
-- Name: auth_logins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.auth_logins_id_seq OWNED BY public.auth_logins.id;


--
-- Name: auth_permissions_users; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.auth_permissions_users (
    id integer NOT NULL,
    user_id integer NOT NULL,
    permission character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL
);


ALTER TABLE public.auth_permissions_users OWNER TO torrent;

--
-- Name: auth_permissions_users_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.auth_permissions_users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.auth_permissions_users_id_seq OWNER TO torrent;

--
-- Name: auth_permissions_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.auth_permissions_users_id_seq OWNED BY public.auth_permissions_users.id;


--
-- Name: auth_remember_tokens; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.auth_remember_tokens (
    id integer NOT NULL,
    selector character varying(255) NOT NULL,
    "hashedValidator" character varying(255) NOT NULL,
    user_id integer NOT NULL,
    expires timestamp without time zone NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.auth_remember_tokens OWNER TO torrent;

--
-- Name: auth_remember_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.auth_remember_tokens_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.auth_remember_tokens_id_seq OWNER TO torrent;

--
-- Name: auth_remember_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.auth_remember_tokens_id_seq OWNED BY public.auth_remember_tokens.id;


--
-- Name: auth_token_logins; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.auth_token_logins (
    id integer NOT NULL,
    ip_address character varying(255) NOT NULL,
    user_agent character varying(255) DEFAULT NULL::character varying,
    id_type character varying(255) NOT NULL,
    identifier character varying(255) NOT NULL,
    user_id integer,
    date timestamp without time zone NOT NULL,
    success smallint NOT NULL
);


ALTER TABLE public.auth_token_logins OWNER TO torrent;

--
-- Name: auth_token_logins_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.auth_token_logins_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.auth_token_logins_id_seq OWNER TO torrent;

--
-- Name: auth_token_logins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.auth_token_logins_id_seq OWNED BY public.auth_token_logins.id;


--
-- Name: bookmarks; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.bookmarks (
    id integer NOT NULL,
    user_id integer NOT NULL,
    t_id integer NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone
);


ALTER TABLE public.bookmarks OWNER TO torrent;

--
-- Name: bookmarks_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.bookmarks_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.bookmarks_id_seq OWNER TO torrent;

--
-- Name: bookmarks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.bookmarks_id_seq OWNED BY public.bookmarks.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.categories (
    id integer NOT NULL,
    sort integer DEFAULT 0 NOT NULL,
    name character varying(255) DEFAULT ''::character varying NOT NULL,
    "desc" character varying(255) NOT NULL,
    parent integer DEFAULT 0 NOT NULL,
    url character varying(70) NOT NULL,
    img character varying(100) NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone
);


ALTER TABLE public.categories OWNER TO torrent;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.categories_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categories_id_seq OWNER TO torrent;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: comments; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.comments (
    id integer NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    fid integer DEFAULT 0 NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    editedby integer DEFAULT 0 NOT NULL,
    text text NOT NULL,
    location public.location DEFAULT 'torrent'::public.location
);


ALTER TABLE public.comments OWNER TO torrent;

--
-- Name: comments_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.comments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.comments_id_seq OWNER TO torrent;

--
-- Name: comments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.comments_id_seq OWNED BY public.comments.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.migrations (
    id bigint NOT NULL,
    version character varying(255) NOT NULL,
    class character varying(255) NOT NULL,
    "group" character varying(255) NOT NULL,
    namespace character varying(255) NOT NULL,
    "time" integer NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO torrent;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO torrent;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: news; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.news (
    id integer NOT NULL,
    title character varying(500) NOT NULL,
    text text NOT NULL,
    url character varying(500) NOT NULL,
    can_comment smallint DEFAULT 1 NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone
);


ALTER TABLE public.news OWNER TO torrent;

--
-- Name: news_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.news_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.news_id_seq OWNER TO torrent;

--
-- Name: news_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.news_id_seq OWNED BY public.news.id;


--
-- Name: reports; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.reports (
    id integer NOT NULL,
    fid integer NOT NULL,
    comment text NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    modded_by integer DEFAULT 0 NOT NULL,
    location character varying(10) NOT NULL,
    sender integer DEFAULT 0 NOT NULL,
    ip character varying(100) NOT NULL
);


ALTER TABLE public.reports OWNER TO torrent;

--
-- Name: reports_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.reports_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.reports_id_seq OWNER TO torrent;

--
-- Name: reports_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.reports_id_seq OWNED BY public.reports.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.sessions (
    id character varying(128) NOT NULL,
    ip_address character varying(45) NOT NULL,
    "timestamp" timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    data bytea NOT NULL
);


ALTER TABLE public.sessions OWNER TO torrent;

--
-- Name: settings; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.settings (
    id integer NOT NULL,
    class character varying(255) NOT NULL,
    key character varying(255) NOT NULL,
    value text,
    type character varying(31) DEFAULT 'string'::character varying NOT NULL,
    context character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.settings OWNER TO torrent;

--
-- Name: settings_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.settings_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.settings_id_seq OWNER TO torrent;

--
-- Name: settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.settings_id_seq OWNED BY public.settings.id;


--
-- Name: torrents; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.torrents (
    id integer NOT NULL,
    owner integer DEFAULT 0 NOT NULL,
    infohash_v1 bytea,
    infohash_v2 bytea,
    numfiles integer DEFAULT 0 NOT NULL,
    size bigint DEFAULT 0 NOT NULL,
    type smallint NOT NULL,
    name character varying(500) NOT NULL,
    descr text NOT NULL,
    category integer DEFAULT 0 NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    poster character varying(255),
    magnet text,
    url character varying(250),
    comments integer DEFAULT 0 NOT NULL,
    can_comment smallint DEFAULT 1 NOT NULL,
    modded smallint DEFAULT 0 NOT NULL,
    views integer DEFAULT 0 NOT NULL,
    downloaded integer DEFAULT 0,
    file_name character varying(255) NOT NULL,
    version smallint NOT NULL,
    seed integer,
    leech integer,
    completed integer,
    updated_peer timestamp without time zone,
    file smallint
);


ALTER TABLE public.torrents OWNER TO torrent;

--
-- Name: torrents_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.torrents_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.torrents_id_seq OWNER TO torrent;

--
-- Name: torrents_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.torrents_id_seq OWNED BY public.torrents.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: torrent
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(30),
    status character varying(255),
    status_message character varying(255),
    last_active timestamp without time zone,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    avatar character varying(255) DEFAULT ''::character varying NOT NULL,
    first_name character varying(255) DEFAULT ''::character varying NOT NULL,
    last_name character varying(255) DEFAULT ''::character varying NOT NULL,
    birthdate date,
    active smallint DEFAULT 0 NOT NULL
);


ALTER TABLE public.users OWNER TO torrent;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: torrent
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO torrent;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: torrent
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: admin_log id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.admin_log ALTER COLUMN id SET DEFAULT nextval('public.admin_log_id_seq'::regclass);


--
-- Name: auth_groups_users id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_groups_users ALTER COLUMN id SET DEFAULT nextval('public.auth_groups_users_id_seq'::regclass);


--
-- Name: auth_identities id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_identities ALTER COLUMN id SET DEFAULT nextval('public.auth_identities_id_seq'::regclass);


--
-- Name: auth_logins id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_logins ALTER COLUMN id SET DEFAULT nextval('public.auth_logins_id_seq'::regclass);


--
-- Name: auth_permissions_users id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_permissions_users ALTER COLUMN id SET DEFAULT nextval('public.auth_permissions_users_id_seq'::regclass);


--
-- Name: auth_remember_tokens id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_remember_tokens ALTER COLUMN id SET DEFAULT nextval('public.auth_remember_tokens_id_seq'::regclass);


--
-- Name: auth_token_logins id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_token_logins ALTER COLUMN id SET DEFAULT nextval('public.auth_token_logins_id_seq'::regclass);


--
-- Name: bookmarks id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.bookmarks ALTER COLUMN id SET DEFAULT nextval('public.bookmarks_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: comments id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.comments ALTER COLUMN id SET DEFAULT nextval('public.comments_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: news id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.news ALTER COLUMN id SET DEFAULT nextval('public.news_id_seq'::regclass);


--
-- Name: reports id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.reports ALTER COLUMN id SET DEFAULT nextval('public.reports_id_seq'::regclass);


--
-- Name: settings id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.settings ALTER COLUMN id SET DEFAULT nextval('public.settings_id_seq'::regclass);


--
-- Name: torrents id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.torrents ALTER COLUMN id SET DEFAULT nextval('public.torrents_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: admin_log admin_log_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.admin_log
    ADD CONSTRAINT admin_log_pkey PRIMARY KEY (id);


--
-- Name: auth_groups_users auth_groups_users_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_groups_users
    ADD CONSTRAINT auth_groups_users_pkey PRIMARY KEY (id);


--
-- Name: auth_identities auth_identities_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_identities
    ADD CONSTRAINT auth_identities_pkey PRIMARY KEY (id);


--
-- Name: auth_identities auth_identities_type_secret_key; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_identities
    ADD CONSTRAINT auth_identities_type_secret_key UNIQUE (type, secret);


--
-- Name: auth_logins auth_logins_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_logins
    ADD CONSTRAINT auth_logins_pkey PRIMARY KEY (id);


--
-- Name: auth_permissions_users auth_permissions_users_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_permissions_users
    ADD CONSTRAINT auth_permissions_users_pkey PRIMARY KEY (id);


--
-- Name: auth_remember_tokens auth_remember_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_remember_tokens
    ADD CONSTRAINT auth_remember_tokens_pkey PRIMARY KEY (id);


--
-- Name: auth_remember_tokens auth_remember_tokens_selector_key; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_remember_tokens
    ADD CONSTRAINT auth_remember_tokens_selector_key UNIQUE (selector);


--
-- Name: auth_token_logins auth_token_logins_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_token_logins
    ADD CONSTRAINT auth_token_logins_pkey PRIMARY KEY (id);


--
-- Name: bookmarks bookmarks_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.bookmarks
    ADD CONSTRAINT bookmarks_pkey PRIMARY KEY (id);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: comments comments_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: news news_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_pkey PRIMARY KEY (id);


--
-- Name: reports reports_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.reports
    ADD CONSTRAINT reports_pkey PRIMARY KEY (id);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id, ip_address);


--
-- Name: settings settings_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_pkey PRIMARY KEY (id);


--
-- Name: torrents torrents_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.torrents
    ADD CONSTRAINT torrents_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: auth_identities_user_id_key; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX auth_identities_user_id_key ON public.auth_identities USING btree (user_id);


--
-- Name: auth_logins_id_type_identifier_idx; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX auth_logins_id_type_identifier_idx ON public.auth_logins USING btree (id_type, identifier);


--
-- Name: auth_logins_user_id_idx; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX auth_logins_user_id_idx ON public.auth_logins USING btree (user_id);


--
-- Name: auth_remember_tokens_user_id_key; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX auth_remember_tokens_user_id_key ON public.auth_remember_tokens USING btree (user_id);


--
-- Name: auth_token_logins_id_type_identifier_idx; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX auth_token_logins_id_type_identifier_idx ON public.auth_token_logins USING btree (id_type, identifier);


--
-- Name: auth_token_logins_user_id_idx; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX auth_token_logins_user_id_idx ON public.auth_token_logins USING btree (user_id);


--
-- Name: fulltext_descr_idx; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX fulltext_descr_idx ON public.torrents USING gin (to_tsvector('simple'::regconfig, descr));


--
-- Name: fulltext_name_idx; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX fulltext_name_idx ON public.torrents USING gin (to_tsvector('simple'::regconfig, (name)::text));


--
-- Name: fulltext_text_idx; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX fulltext_text_idx ON public.news USING gin (to_tsvector('simple'::regconfig, text));


--
-- Name: fulltext_title_idx; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX fulltext_title_idx ON public.news USING gin (to_tsvector('simple'::regconfig, (title)::text));


--
-- Name: timestamp; Type: INDEX; Schema: public; Owner: torrent
--

CREATE INDEX "timestamp" ON public.sessions USING btree ("timestamp");


--
-- Name: torrents_infohash_v1_key; Type: INDEX; Schema: public; Owner: torrent
--

CREATE UNIQUE INDEX torrents_infohash_v1_key ON public.torrents USING btree (infohash_v1);


--
-- Name: torrents_infohash_v2_key; Type: INDEX; Schema: public; Owner: torrent
--

CREATE UNIQUE INDEX torrents_infohash_v2_key ON public.torrents USING btree (infohash_v2);


--
-- Name: auth_groups_users auth_groups_users_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_groups_users
    ADD CONSTRAINT auth_groups_users_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: auth_identities auth_identities_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_identities
    ADD CONSTRAINT auth_identities_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: auth_permissions_users auth_permissions_users_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_permissions_users
    ADD CONSTRAINT auth_permissions_users_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: auth_remember_tokens auth_remember_tokens_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: torrent
--

ALTER TABLE ONLY public.auth_remember_tokens
    ADD CONSTRAINT auth_remember_tokens_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--


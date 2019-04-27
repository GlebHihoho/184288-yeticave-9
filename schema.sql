CREATE DATABASE yeticave;

CREATE TABLE categories(
  id INTEGER PRIMARY KEY,
  title TEXT,
  code TEXT
);

CREATE TABLE lots(
  id INTEGER PRIMARY KEY,
  title TEXT,
  explanation TEXT,
  picture TEXT,
  start_cost NUMERIC,
  date_start TIMESTAMP,
  date_end TIMESTAMP,
  step_rate NUMERIC,
  winner INTEGER,
  FOREIGN KEY (winner) REFERENCES users(id),
  category INTEGER,
  FOREIGN KEY (category) REFERENCES categories(id),
);

CREATE TABLE user_lots(
  user_id INTEGER,
  lot_id INTEGER,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (lot_id) REFERENCES lots(id)
);

CREATE TABLE rates(
  id INTEGER PRIMARY KEY,
  date_first TIMESTAMP,
  cost INTEGER,
  lot_id INTEGER,
  FOREIGN KEY (lot_id) REFERENCES lots(id)
);

CREATE TABLE user_rate(
  user_id INTEGER,
  rate_id INTEGER,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (rate_id) REFERENCES rates(id)
)

CREATE TABLE users(
  id INTEGER PRIMARY KEY,
  registration_date TIMESTAMP,
  email TEXT,
  name TEXT,
  password CHAR(32),
  image TEXT,
  contacts TEXT
);


INSERT INTO categories VALUES(1, 'Доски и лыжи', 'boards');
INSERT INTO categories VALUES(2, 'Крепления', 'attachment');
INSERT INTO categories VALUES(3, 'Ботинки', 'boots');
INSERT INTO categories VALUES(4, 'Одежда', 'clothing');
INSERT INTO categories VALUES(5, 'Доски и лыжи', 'boards');
INSERT INTO categories VALUES(6, 'Разное', 'other');

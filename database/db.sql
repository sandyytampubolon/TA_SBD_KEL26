CREATE TABLE customers (
    id_customer INTEGER PRIMARY KEY,
    nama VARCHAR(200) NOT NULL,
    alamat VARCHAR(200) NOT NULL,
    age INTEGER
);

CREATE TABLE vinyls (
    id_vinyl INTEGER PRIMARY KEY,
    nama_vinyl VARCHAR(200) NOT NULL,
    price INT NOT NULL
);

CREATE TABLE categories (
    id_category INTEGER PRIMARY KEY,
    nama_category VARCHAR(200) NOT NULL,
    pop_rate  INTEGER
);

CREATE TABLE transaksis (
    id_transaction INTEGER PRIMARY KEY,
    fk_id_customer INTEGER,
    fk_id_vinyl INTEGER,
    fk_id_category INTEGER,  -- Tambahkan foreign key untuk kategori
    transaction_date DATE NOT NULL,
    item_amount INTEGER NOT NULL,
    FOREIGN KEY (fk_id_customer) REFERENCES customers(id_customer),
    FOREIGN KEY (fk_id_vinyl) REFERENCES vinyls(id_vinyl),
    FOREIGN KEY (fk_id_category) REFERENCES categories(id_category)
);

-- DML INSERT pada tabel pelanggan
-- DML INSERT pada tabel customers
INSERT INTO customers (id_customer, nama, alamat, age)
VALUES (1, 'Joni', 'Sipodang', 25);
INSERT INTO customers (id_customer, nama, alamat, age)
VALUES (2, 'Nixon', 'Semarang', 30);
INSERT INTO customers (id_customer, nama, alamat, age)
VALUES (3, 'Leo', 'Unnes', 28);
INSERT INTO customers (id_customer, nama, alamat, age)
VALUES (4, 'Elsa', 'Elsa Street', 22);
INSERT INTO customers (id_customer, nama, alamat, age)
VALUES (5, 'Farhan', 'Farhan Street', 33);
INSERT INTO customers (id_customer, nama, alamat, age)
VALUES (6, 'Gina', 'Gina Street', 29);


-- DML INSERT pada tabel produk
-- DML INSERT pada tabel vinyls
INSERT INTO vinyls (id_vinyl, nama_vinyl, price, fk_id_category) VALUES (1, 'Retro Beats Vinyl', 8000, 1);
INSERT INTO vinyls (id_vinyl, nama_vinyl, price, fk_id_category) VALUES (2, 'Digital Groove Vinyl', 50000, 2);
INSERT INTO vinyls (id_vinyl, nama_vinyl, price, fk_id_category) VALUES (3, 'Powerful Sound Vinyl', 300000, 3);
INSERT INTO vinyls (id_vinyl, nama_vinyl, price, fk_id_category) VALUES (4, 'Studio Beats Vinyl', 200000, 2);
INSERT INTO vinyls (id_vinyl, nama_vinyl, price, fk_id_category) VALUES (5, 'Audio Bliss Vinyl', 250000, 1);

-- DML INSERT pada tabel transaksi_tb
INSERT INTO categories (id_category, nama_category, pop_rate) VALUES (1, 'Electronics', 30);
INSERT INTO categories (id_category, nama_category, pop_rate) VALUES (2, 'Accessories', 20);
INSERT INTO categories (id_category, nama_category, pop_rate) VALUES (3, 'Audio', 40);

-- DML INSERT pada tabel transaksis (bukan transaksi_tb)
INSERT INTO transaksis (id_transaction, fk_id_customer, fk_id_vinyl, fk_id_category, transaction_date, item_amount)
VALUES (1, 1, 1, 1, '2023-10-07', 2);
INSERT INTO transaksis (id_transaction, fk_id_customer, fk_id_vinyl, fk_id_category, transaction_date, item_amount)
VALUES (2, 2, 3, 2, '2023-10-08', 1);
INSERT INTO transaksis (id_transaction, fk_id_customer, fk_id_vinyl, fk_id_category, transaction_date, item_amount)
VALUES (3, 3, 2, 3, '2023-10-09', 3);
INSERT INTO transaksis (id_transaction, fk_id_customer, fk_id_vinyl, fk_id_category, transaction_date, item_amount)
VALUES (4, 4, 4, 1, '2023-10-10', 1);
INSERT INTO transaksis (id_transaction, fk_id_customer, fk_id_vinyl, fk_id_category, transaction_date, item_amount)
VALUES (5, 5, 5, 2, '2023-10-11', 2);

-- Inner Join antara tabel transaksis, customers, vinyls, dan categories
SELECT
    transaksis.id_transaction,
    customers.nama,
    vinyls.nama_vinyl,
    categories.nama_category,
    transaksis.transaction_date,
    transaksis.item_amount
FROM
    transaksis
INNER JOIN
    customers ON transaksis.fk_id_customer = customers.id_customer
INNER JOIN
    vinyls ON transaksis.fk_id_vinyl = vinyls.id_vinyl
INNER JOIN
    categories ON transaksis.fk_id_category = categories.id_category;

-- IN


SELECT *
FROM transaksi_tb
WHERE fk_id_pelanggan IN (1, 3, 5);

--BETWEEN
SELECT *
FROM transaksi_tb
WHERE transaction_date BETWEEN '2023-10-08' AND '2023-10-10';

--LIKE
SELECT *
FROM transaksi_tb
JOIN produk ON transaksi_tb.fk_id_item = produk.id_item
WHERE produk.nama_barang LIKE '%Headset%';

--LIKE
SELECT * FROM pelanggan where nama_pelanggan like '%tan%';


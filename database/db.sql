CREATE TABLE pelanggans (
    id_pelanggan INTEGER PRIMARY KEY,
    nama_pelanggan VARCHAR(200) NOT NULL,
    alamat VARCHAR(200) NOT NULL,
    loyalty_rank CHAR(1) NOT NULL
);

CREATE TABLE produks (
    id_item INTEGER PRIMARY KEY,
    nama_barang VARCHAR(200) NOT NULL,
    harga_barang INT NOT NULL
);

CREATE TABLE merks (
    id_merk INTEGER PRIMARY KEY,
    nama_merk VARCHAR(200) NOT NULL,
    country  VARCHAR(200) NOT NULL
);

CREATE TABLE transaksi_tbs (

    id_transactions INTEGER PRIMARY KEY,
    fk_id_pelanggan INTEGER,
    fk_id_item INTEGER,
    transaction_date DATE NOT NULL,
    item_amount INTEGER NOT NULL,
    FOREIGN KEY (fk_id_pelanggan) REFERENCES pelanggans(id_pelanggan),
    FOREIGN KEY (fk_id_item) REFERENCES produks(id_item)
);

-- DML INSERT pada tabel pelanggan
INSERT INTO pelanggans (id_pelanggan, nama_pelanggan, alamat, loyalty_rank)
VALUES (1, 'Ratna', 'Ahmad Street', 'A');
INSERT INTO pelanggans (id_pelanggan, nama_pelanggan, alamat, loyalty_rank)
VALUES (2, 'Agoy', 'Budi Street', 'C');
INSERT INTO pelanggans (id_pelanggan, nama_pelanggan, alamat, loyalty_rank)
VALUES (3, 'Yuda', 'Aminah Street', 'B');
INSERT INTO pelanggans (id_pelanggan, nama_pelanggan, alamat, loyalty_rank)
VALUES (4, 'Donito', 'John Street', 'C');
INSERT INTO pelanggans (id_pelanggan, nama_pelanggan, alamat, loyalty_rank)
VALUES (5, 'Sutan', 'Sutan Street', 'S');
INSERT INTO pelanggans (id_pelanggan, nama_pelanggan, alamat, loyalty_rank)
VALUES (6, 'Sultan', 'Sultan Street', 'C');

-- DML INSERT pada tabel produk
INSERT INTO produk (id_item, nama_barang, harga_barang) VALUES (1, 'USB-C Charger', 8000);
INSERT INTO produk (id_item, nama_barang, harga_barang) VALUES (2, 'Smartphone', 50000);
INSERT INTO produk (id_item, nama_barang, harga_barang) VALUES (3, 'Powerbank', 300000);
INSERT INTO produk (id_item, nama_barang, harga_barang) VALUES (4, 'Headset', 200000);
INSERT INTO produk (id_item, nama_barang, harga_barang) VALUES (5, 'Earbuds', 250000);

-- DML INSERT pada tabel transaksi_tb
INSERT INTO transaksi_tb (id_transactions, fk_id_pelanggan, fk_id_item, transaction_date, item_amount) VALUES (1, 1, 1, '2023-10-07', 2);
INSERT INTO transaksi_tb (id_transactions, fk_id_pelanggan, fk_id_item, transaction_date, item_amount) VALUES (2, 2, 3, '2023-10-08', 1);
INSERT INTO transaksi_tb (id_transactions, fk_id_pelanggan, fk_id_item, transaction_date, item_amount) VALUES (3, 3, 2, '2023-10-09', 3);
INSERT INTO transaksi_tb (id_transactions, fk_id_pelanggan, fk_id_item, transaction_date, item_amount) VALUES (4, 4, 4, '2023-10-10', 1);
INSERT INTO transaksi_tb (id_transactions, fk_id_pelanggan, fk_id_item, transaction_date, item_amount) VALUES (5, 5, 5, '2023-10-11', 2);


-- Inner Join antara tabel transaksi_tb, pelanggan, dan produk
SELECT
    transaksi_tb.id_transactions,
    pelanggan.nama_pelanggan,
    produk.nama_barang,
    transaksi_tb.transaction_date,
    transaksi_tb.item_amount
FROM
    transaksi_tb
INNER JOIN
    pelanggan ON transaksi_tb.fk_id_pelanggan = pelanggan.id_pelanggan
INNER JOIN
    produk ON transaksi_tb.fk_id_item = produk.id_item;

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

